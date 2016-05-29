<?php

namespace US\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 *
 * @ORM\Entity(repositoryClass="\US\CoreBundle\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image {

    const REFERENCE = 'USCoreBundle:Image';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true)
     * @Assert\NotNull()
     * @Assert\Length(min=5, minMessage="Le nom doit faire au moins {{ limit }} caractères.", max=255, maxMessage="Le nom ne doit pas faire plus de {{ limit }} caractères.")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ext", type="string", length=255)
     */
    private $ext;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $alt;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, nullable=true)
     */
    private $oldName;

    /**
     * @ORM\OneToMany(targetEntity="US\CatalogBundle\Entity\Product", mappedBy="image")
     * @ORM\JoinColumn(nullable=true)
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="US\NewsBundle\Entity\News", mappedBy="image")
     * @ORM\JoinColumn(nullable=true)
     */
    private $news;

    /**
     * @ORM\OneToMany(targetEntity="US\CatalogBundle\Entity\Category", mappedBy="image")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categories;

    /**
     * @Assert\File(mimeTypes={"application/pdf", "image/png", "image/jpeg", "image/gif"})
     */
    private $file;
    private $oldNameFile;
    private $tempFilename;

    /**
     * Constructor
     */
    public function __construct() {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->news = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Image
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set oldName
     *
     * @param string $oldName
     * @return Image
     */
    public function setOldName($oldName) {
        $this->oldName = $oldName;

        return $this;
    }

    /**
     * Get oldName
     *
     * @return string
     */
    public function getOldName() {
        return $this->oldName;
    }

    /**
     * Set oldFileName
     *
     * @param string $oldFileName
     * @return Image
     */
    public function setOldFileName($oldFileName) {
        $this->oldFileName = $oldFileName;

        return $this;
    }

    /**
     * Get oldFileName
     *
     * @return string
     */
    public function getOldFileName() {
        return $this->oldFileName;
    }

    /**
     * Set ext
     *
     * @param string $ext
     * @return Image
     */
    public function setExt($ext) {
        $this->ext = $ext;

        return $this;
    }

    /**
     * Get ext
     *
     * @return string
     */
    public function getExt() {
        return $this->ext;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt) {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt() {
        return $this->alt;
    }

    public function getFile() {
        return $this->file;
    }

    // On modifie le setter de File, pour prendre en compte l'upload d'un fichier lorsqu'il en existe déjà un autre
    public function setFile(UploadedFile $file) {
        $this->file = $file;

        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->ext) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->ext;

            // On sauvegarde l'ancien nom
            $this->oldFileName = $this->oldName;

            // On réinitialise les valeurs des attributs ext et oldName
            $this->ext = null;
            $this->oldName = null;
        }
    }

    /**
     * Add products
     *
     * @param \US\CatalogBundle\Entity\Product $product
     * @return Image
     */
    public function addProduct(\US\CatalogBundle\Entity\Product $product) {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \US\CatalogBundle\Entity\Product $product
     */
    public function removeProduct(\US\CatalogBundle\Entity\Product $product) {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts() {
        return $this->products;
    }

    /**
     * Add news
     *
     * @param \US\NewsBundle\Entity\News $news
     * @return Image
     */
    public function addNews(\US\NewsBundle\Entity\News $news) {
        $this->news[] = $news;

        return $this;
    }

    /**
     * Remove news
     *
     * @param \US\NewsBundle\Entity\News $news
     */
    public function removeNews(\US\NewsBundle\Entity\News $news) {
        $this->news->removeElement($news);
    }

    /**
     * Get news
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNews() {
        return $this->news;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }

        // Le nom du fichier est son id, on doit juste stocker également son extension
        // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « url »
        $this->ext = $this->file->guessExtension();

        // Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        //$this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }

        // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFileSame = $this->getUploadRootDir() . '/' . $this->name . '.' . $this->tempFilename;
            $oldFileDifferent = $this->getUploadRootDir() . '/' . $this->oldFileName . '.' . $this->tempFilename;
            if (file_exists($oldFileSame)) {
                unlink($oldFileSame);
            } else if (file_exists($oldFileDifferent)) {
                unlink($oldFileDifferent);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
                $this->getUploadRootDir(), // Le répertoire de destination
                $this->name . '.' . $this->ext   // Le nom du fichier à créer, ici « name.extension »
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->name . '.' . $this->ext;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir() {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/img';
    }

    protected function getUploadRootDir() {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPath() {
        return $this->getUploadDir() . '/' . $this->getName() . '.' . $this->getExt();
    }

}
