<?php

return [

    'deleted' => 'Gelöschtes Asset-Modell',
    'does_not_exist' => 'Modell existiert nicht.',
    'no_association' => 'WARNUNG! Das Asset Modell für dieses Element ist ungültig oder fehlt!',
    'no_association_fix' => 'Dies wird Dinge auf seltsame und schreckliche Weise zerstören. Bearbeite dieses Asset jetzt, um ihm ein Modell zuzuordnen.',
    'assoc_users' => 'Dieses Modell ist zur Zeit mit einem oder mehreren Assets verknüpft und kann nicht gelöscht werden. Bitte lösche die Assets und versuche dann erneut, das Modell zu löschen. ',
    'invalid_category_type' => 'Diese Kategorie muss eine Asset-Kategorie sein.',

    'create' => [
        'error' => 'Modell wurde nicht erstellt. Bitte versuche es noch einmal.',
        'success' => 'Modell wurde erfolgreich erstellt.',
        'duplicate_set' => 'Ein Asset-Modell mit diesem Namen, Hersteller und Modell Nummer existiert bereits.',
    ],

    'update' => [
        'error' => 'Modell wurde nicht aktualisiert. Bitte versuch es noch einmal',
        'success' => 'Modell wurde erfolgreich aktualisiert.',
    ],

    'delete' => [
        'confirm' => 'Bist du sicher, dass du dieses Asset-Modell entfernen möchtest?',
        'error' => 'Beim Löschen des Modell ist ein Fehler aufgetreten. Bitte versuche es noch einmal.',
        'success' => 'Das Modell wurde erfolgreich gelöscht.',
    ],

    'restore' => [
        'error' => 'Modell wurde nicht wiederhergestellt, bitte versuche es noch einmal',
        'success' => 'Modell wurde erfolgreich wiederhergestellt.',
    ],

    'bulkedit' => [
        'error' => 'Es wurden keine Felder geändert, somit wurde auch nichts aktualisiert.',
        'success' => 'Modell erfolgreich aktualisiert. |:model_count Modelle erfolgreich aktualisiert.',
        'warn' => 'Du bist dabei, die Eigenschaften des folgenden Modells zu aktualisieren: |Du bist dabei, die Eigenschaften der folgenden :model_count Modelle zu bearbeiten:',

    ],

    'bulkdelete' => [
        'error' => 'Es wurden keine Modelle ausgewählt. Somit wurde auch nichts gelöscht.',
        'nothing_deletable' => 'Keines der ausgewählten Modelle kann gelöscht werden, da ihnen noch Assets zugeordnet sind.',
        'success' => 'Modell gelöscht!|:success_count Modelle gelöscht!',
        'success_partial' => ':success_count Modell(e) wurden gelöscht. Jedoch konnten :fail_count nicht gelöscht werden, da ihnen noch Assets zugeordnet sind.',
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
