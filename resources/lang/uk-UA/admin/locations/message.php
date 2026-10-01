<?php

return [

    'does_not_exist' => 'Розташування не існує.',
    'assoc_users' => 'Цю локацію наразі неможливо видалити, оскільки вона є основною для принаймні одного об’єкта чи користувача, до неї прив’язані активи або вона є батьківською для іншої локації. Будь ласка, оновіть свої записи, щоб вони більше не посилалися на цю локацію, і спробуйте знову ',
    'assoc_assets' => 'Це розташування в даний час пов\'язано принаймні з одним активом і не може бути видалений. Будь ласка, оновіть ваші медіафайли, щоб більше не посилатися на це розташування і повторіть спробу. ',
    'assoc_child_loc' => 'Це місцезнаходження наразі батько принаймні одного дочірнього місця і не може бути видалений. Будь ласка, оновіть ваше місцеположення, щоб більше не посилатися на це місце і повторіть спробу. ',
    'assigned_assets' => 'Призначені активи',
    'current_location' => 'Поточне місцезнаходження',
    'deleted_warning' => 'Цю локацію було видалено. Будь ласка, відновіть її, перш ніж намагатися внести будь-які зміни.',

    'create' => [
        'error' => 'Місце не створено, спробуйте ще раз.',
        'success' => 'Розташування успішно створено.',
    ],

    'update' => [
        'error' => 'Розташування не було оновлено, спробуйте ще раз',
        'success' => 'Розташування успішно створено.',
    ],

    'restore' => [
        'error' => 'Розташування не було відновлено, спробуйте ще раз',
        'success' => 'Розташування успішно відновлено.',
    ],

    'delete' => [
        'confirm' => 'Ви впевнені, що хочете видати це розташування?',
        'error' => 'Виникла проблема з видаленням місцезнаходження. Будь ласка, спробуйте ще раз.',
        'success' => 'Розташування було успішно видалено.',
    ],

    'bulkedit' => [
        'error' => 'Немає змінених полів, тому нічого не було оновлено.',
        'success' => 'Location successfully updated.|:count locations successfully updated.',
        'warn' => 'Edit the fields below to update this location. Fields you leave blank will not change on the location.|Edit the fields below to update all :count selected locations. Fields you leave blank will not change on any of them.',
        'show_selected' => '1 selected location|:count selected locations',
        'company_scope_mismatch_partial' => 'The company was not changed on 1 location because items or users at that location belong to different companies. Update or move those first.|The company was not changed on :count locations because items or users at those locations belong to different companies. Update or move those first.',
        'company_scope_mismatch_all' => 'No locations were reassigned. The requested company does not match items or users at the selected location.|No locations were reassigned. The requested company does not match items or users at any of the :count selected locations.',
        'parent_company_mismatch_partial' => 'The parent or company was not changed on 1 location because it would leave the location in a different company than its parent.|The parent or company was not changed on :count locations because it would leave those locations in a different company than their parent.',
        'parent_company_mismatch_all' => 'No changes were saved. The requested parent or company would leave the location in a different company than its parent.|No changes were saved. The requested parent or company would leave every one of the :count selected locations in a different company than their parent.',
    ],

];
