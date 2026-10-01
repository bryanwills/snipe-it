<?php

return [

    'does_not_exist' => 'ロケーションが存在しません。',
    'assoc_users' => 'This location is not currently deletable because it is the location of record for at least one item or user, has assets assigned to it, or is the parent location of another location. Please update your records to no longer reference this location and try again ',
    'assoc_assets' => 'この設置場所は1人以上の利用者に関連付けされているため、削除できません。設置場所の関連付けを削除し、もう一度試して下さい。 ',
    'assoc_child_loc' => 'この設置場所は、少なくとも一つの配下の設置場所があります。この設置場所を参照しないよう更新して下さい。 ',
    'assigned_assets' => '割り当て済みアセット',
    'current_location' => '現在の場所',
    'deleted_warning' => 'This location has been deleted. Please restore it before attempting to make any changes.',

    'create' => [
        'error' => 'ロケーションが作成できませんでした。もう一度やり直して下さい。',
        'success' => 'ロケーションが作成されました。',
    ],

    'update' => [
        'error' => 'ロケーションが更新できませんでした。もう一度やり直して下さい。',
        'success' => 'ロケーションが更新されました。',
    ],

    'restore' => [
        'error' => 'ロケーションが復元できませんでした。もう一度やり直してください。',
        'success' => 'ロケーションが復元されました。',
    ],

    'delete' => [
        'confirm' => 'このロケーションを本当に削除してよいですか？',
        'error' => 'ロケーションを削除する際に問題が発生しました。もう一度やり直して下さい。',
        'success' => 'ロケーションが削除されました。',
    ],

    'bulkedit' => [
        'error' => 'フィールドが選択されていないため、更新されませんでした。',
        'success' => 'Location successfully updated.|:count locations successfully updated.',
        'warn' => 'Edit the fields below to update this location. Fields you leave blank will not change on the location.|Edit the fields below to update all :count selected locations. Fields you leave blank will not change on any of them.',
        'show_selected' => '1 selected location|:count selected locations',
        'company_scope_mismatch_partial' => 'The company was not changed on 1 location because items or users at that location belong to different companies. Update or move those first.|The company was not changed on :count locations because items or users at those locations belong to different companies. Update or move those first.',
        'company_scope_mismatch_all' => 'No locations were reassigned. The requested company does not match items or users at the selected location.|No locations were reassigned. The requested company does not match items or users at any of the :count selected locations.',
        'parent_company_mismatch_partial' => 'The parent or company was not changed on 1 location because it would leave the location in a different company than its parent.|The parent or company was not changed on :count locations because it would leave those locations in a different company than their parent.',
        'parent_company_mismatch_all' => 'No changes were saved. The requested parent or company would leave the location in a different company than its parent.|No changes were saved. The requested parent or company would leave every one of the :count selected locations in a different company than their parent.',
    ],

];
