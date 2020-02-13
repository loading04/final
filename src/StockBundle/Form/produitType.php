<?php

namespace StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class produitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('nomProduit')
            ->add('descriptionProduit')
            ->add('quantite')
            ->add('prixUnitaire')
            ->add('prixVente')
            ->add('dateFabrication')
            ->add('dateExpiration')
            ->add('categorie')
            ->add('photoProduit', FileType::class, array('data_class'=>null, 'required'=>false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StockBundle\Entity\produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'stockbundle_produit';
    }


}
