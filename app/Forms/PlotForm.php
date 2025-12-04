<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PlotForm extends Form
{
    public function buildForm()
    {
        $this->add('plotTitle', 'text', ['label' => 'Titel'])
            ->add('plotMunicipality', 'text', ['label' => 'Gemeente'])
            ->add('plotSection', 'text', ['label' => 'Sectie'])
            ->add('plotNum', 'number', ['label' => 'Perceel nummer'])
            ->add('submit', 'submit', ['label' => 'Opslaan']);
    }
}
