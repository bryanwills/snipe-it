<?php

return [

    'deleted' => 'Modèle d\'actif supprimé',
    'does_not_exist' => 'Le modèle n\'existe pas.',
    'no_association' => 'ATTENTION ! Le modèle d\'actif pour cet objet est invalide ou manquant !',
    'no_association_fix' => 'Cela va casser les choses de manière bizarre et horrible. Modifiez cette ressource maintenant pour lui assigner un modèle.',
    'assoc_users' => 'Ce modèle est actuellement associé à au moins un actif et ne peut pas être supprimé. Veuillez supprimer les actifs associés et essayer à nouveau. ',
    'invalid_category_type' => 'This category must be an asset category.',

    'create' => [
        'error' => 'Le modèle n\'a pas été créé, veuillez essayer à nouveau.',
        'success' => 'Le modèle a été créé avec succès.',
        'duplicate_set' => 'Un modèle d\'actif avec ce nom, fabricant et modèle existe déjà.',
    ],

    'update' => [
        'error' => 'Le modèle n\'a pas été mis à jour, veuillez essayer à nouveau',
        'success' => 'Le modèle a été mis à jour avec succès.',
    ],

    'delete' => [
        'confirm' => 'Êtes-vous sûr de vouloir supprimer ce modèle d\'actif ?',
        'error' => 'Un problème a eu lieu pendant la suppression du modèle. Veuillez essayer à nouveau.',
        'success' => 'Le modèle a été supprimé avec succès.',
    ],

    'restore' => [
        'error' => 'Le modèle d\'actif n\'a pas été restauré, veuillez réessayer',
        'success' => 'Modèle d\'actif restauré correctement.',
    ],

    'bulkedit' => [
        'error' => 'Aucun champ n\'a été changé, donc rien n\'a été mis à jour.',
        'success' => 'Modèle mis à jour avec succès. |:model_count modèles mis à jour avec succès.',
        'warn' => 'Vous êtes sur le point de mettre à jour les propriétés du modèle suivant :|Vous êtes sur le point de modifier les propriétés des modèles :model_count suivants :',

    ],

    'bulkdelete' => [
        'error' => 'Aucun modèle n\'a été sélectionné, donc rien n\'a été supprimé.',
        'nothing_deletable' => 'None of the selected models can be deleted because they still have assets associated with them.',
        'success' => 'Modèle supprimé !|:success_count modèles supprimés !',
        'success_partial' => ': les modèles success_count ont été supprimés, cependant : fail_count n\'a pas pu être supprimé car ils ont toujours des ressources associées.',
    ],

    'merge' => [
        'min_two' => 'Select at least two models to merge.',
        'no_target' => 'Select which model to keep before merging.',
        'not_found' => 'One or more of the selected models could not be loaded. Refresh the models list and try again.',
        'information' => 'You are about to merge :count models. Pick the model you want to keep. Every asset attached to the other models will be reassigned to the model you pick, then the source models will be deleted.',
        'warning' => 'This cannot be undone. Reassigned assets will inherit the surviving model\'s category, fieldset, and depreciation settings.',
        'pick_target' => 'Which model do you want to keep?',
        'success' => 'Merged :source_count model(s) into ":target". :asset_count asset(s) were reassigned.',
    ],

];
