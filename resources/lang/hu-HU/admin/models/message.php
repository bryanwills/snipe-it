<?php

return [

    'deleted' => 'Törölt eszköz modell',
    'does_not_exist' => 'Modell nem létezik.',
    'no_association' => 'FIGYELEM! Az eszköz modell hiányzik, vagy nem érvényes!',
    'no_association_fix' => 'Ez furcsa és szörnyű módokon fogja szétzúzni a dolgokat. Szerkeszd ezt az eszközt most, és rendeld hozzá egy modellhez.',
    'assoc_users' => 'Ez a modell jelenleg társított egy vagy több eszközhöz, és nem törölhető. Legyen szíves törölje az eszközt, és próbálja meg ismét a modell törlését. ',
    'invalid_category_type' => 'A kategóriának eszköz típusúnak kell lennie.',

    'create' => [
        'error' => 'A model nem lett létrehozva. Próbálkozz újra.',
        'success' => 'A modell sikeresen létrehozva.',
        'duplicate_set' => 'Már létezik ilyen nevű eszközmodell, gyártó és modellszám.',
    ],

    'update' => [
        'error' => 'A modell nem frissült, próbálkozzon újra',
        'success' => 'A modell sikeresen frissült.',
    ],

    'delete' => [
        'confirm' => 'Biztos benne, hogy törli ezt az eszközmodellt?',
        'error' => 'A modell törlését okozta. Kérlek próbáld újra.',
        'success' => 'A modell sikeresen törölve lett.',
    ],

    'restore' => [
        'error' => 'A modell nem állt helyre, próbálkozzon újra',
        'success' => 'A modell sikeresen visszaállt.',
    ],

    'bulkedit' => [
        'error' => 'Nincsenek mezők megváltoztak, így semmi sem frissült.',
        'success' => 'Eszköz modell sikeresen frissítve. Összesen |:model_count eszköz frissítve.',
        'warn' => 'A következő modell tulajdonságait fogja frissíteni:|A következő modellek tulajdonságait fogja szerkeszteni :model_count :',

    ],

    'bulkdelete' => [
        'error' => 'Nem voltak eszközök kiválasztva, így semmi sem lett törölve.',
        'nothing_deletable' => 'None of the selected models can be deleted because they still have assets associated with them.',
        'success' => 'Eszköz modell törölve! Összesen |:success_count eszköz törölve!',
        'success_partial' => ': success_count modell(ek) törlésre kerültek, azonban ennyit nem sikerült törölni: a fail_count , mert még hozzárendelt eszközökkel rendelkeznek.',
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
