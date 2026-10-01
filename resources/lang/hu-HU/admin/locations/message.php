<?php

return [

    'does_not_exist' => 'Hely nem létezik.',
    'assoc_users' => 'Ez a helyszín jelenleg nem törölhető, mert legalább egy tétel vagy felhasználó alapértelmezett helyszíne, eszközök vannak hozzá rendelve, vagy egy másik helyszín szülőhelye. Kérjük, frissítse az adatait úgy, hogy már ne hivatkozzanak erre a helyszínre, majd próbálja újra ',
    'assoc_assets' => 'Ez a hely jelenleg legalább egy eszközhöz társítva, és nem törölhető. Frissítse eszközeit, hogy ne hivatkozzon erre a helyre, és próbálja újra.',
    'assoc_child_loc' => 'Ez a hely jelenleg legalább egy gyermek helye szülője, és nem törölhető. Frissítse tartózkodási helyeit, hogy ne hivatkozzon erre a helyre, és próbálja újra.',
    'assigned_assets' => 'Hozzárendelt eszközök',
    'current_location' => 'Jelenlegi hely',
    'deleted_warning' => 'Ez a helyszín törlésre került. Kérjük, állítsa vissza, mielőtt bármilyen módosítást végezne.',

    'create' => [
        'error' => 'A helyszín nem jött létre, próbálkozzon újra.',
        'success' => 'A helyszín sikeresen létrehozva.',
    ],

    'update' => [
        'error' => 'A helyszín nem frissült, próbálkozzon újra',
        'success' => 'A helyszín sikeresen frissült.',
    ],

    'restore' => [
        'error' => 'A helyszín nem lett visszaállítva, kérjük, próbálja újra',
        'success' => 'A helyszín sikeresen visszaállítva.',
    ],

    'delete' => [
        'confirm' => 'Biztosan törölni szeretné ezt a helyet?',
        'error' => 'Hiba történt a helyszín törlése közben. Kérlek próbáld újra.',
        'success' => 'A helyszínt sikeresen törölték.',
    ],

    'bulkedit' => [
        'error' => 'Nincsenek mezők megváltoztak, így semmi sem frissült.',
        'success' => 'Location successfully updated.|:count locations successfully updated.',
        'warn' => 'Edit the fields below to update this location. Fields you leave blank will not change on the location.|Edit the fields below to update all :count selected locations. Fields you leave blank will not change on any of them.',
        'show_selected' => '1 selected location|:count selected locations',
        'company_scope_mismatch_partial' => 'The company was not changed on 1 location because items or users at that location belong to different companies. Update or move those first.|The company was not changed on :count locations because items or users at those locations belong to different companies. Update or move those first.',
        'company_scope_mismatch_all' => 'No locations were reassigned. The requested company does not match items or users at the selected location.|No locations were reassigned. The requested company does not match items or users at any of the :count selected locations.',
        'parent_company_mismatch_partial' => 'The parent or company was not changed on 1 location because it would leave the location in a different company than its parent.|The parent or company was not changed on :count locations because it would leave those locations in a different company than their parent.',
        'parent_company_mismatch_all' => 'No changes were saved. The requested parent or company would leave the location in a different company than its parent.|No changes were saved. The requested parent or company would leave every one of the :count selected locations in a different company than their parent.',
    ],

];
