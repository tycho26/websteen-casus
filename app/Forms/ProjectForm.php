<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProjectForm extends Form
{
    public function buildForm()
    {
        $this->add('projectPublic', 'select', [
            'choices' => [true => 'Gepubliceerd', false => 'Prive'],
            'selected' => false,
        ])
            ->add('projectTitle', 'text', ['label' => 'Titel'])
            ->add('projectDescription', 'textarea', ['label' => 'Beschrijving'])
            ->add('projectImage', 'file', ['label' => 'Afbeelding'])
            ->add('submit', 'submit', ['label' => 'Opslaan']);
    }
}
