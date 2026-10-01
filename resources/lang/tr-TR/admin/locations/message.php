<?php

return [

    'does_not_exist' => 'Konum mevcut değil.',
    'assoc_users' => 'Bu konum şu anda silinemez; çünkü en az bir varlık veya kullanıcı için kayıtlı konumdur, üzerine atanmış varlıklar bulunmaktadır veya başka bir konumun üst konumudur (parent location). Lütfen kayıtlarınızı bu konuma referans vermeyecek şekilde güncelleyin ve tekrar deneyin ',
    'assoc_assets' => 'Bu konum şu anda en az bir varlık ile ilişkili ve silinemez. Lütfen artık bu konumu kullanabilmek için varlık konumlarını güncelleştirin.',
    'assoc_child_loc' => 'Bu konum şu anda en az bir alt konum üstüdür ve silinemez. Lütfen artık bu konuma ait alt konumları güncelleyin. ',
    'assigned_assets' => 'Atanan Varlıklar',
    'current_location' => 'Mevcut konum',
    'deleted_warning' => 'Bu konum silindi. Lütfen herhangi bir değişiklik yapmadan önce konumu geri yükleyin.',

    'create' => [
        'error' => 'Konum oluşturulamadı, lütfen tekrar deneyin.',
        'success' => 'Konum oluşturuldu.',
    ],

    'update' => [
        'error' => 'Konum güncellenemedi, lütfen tekrar deneyin',
        'success' => 'Konum güncellendi.',
    ],

    'restore' => [
        'error' => 'Konum geri yüklenemedi, lütfen tekrar deneyin',
        'success' => 'Konum başarıyla geri yüklendi.',
    ],

    'delete' => [
        'confirm' => 'Konumu silmek istediğinize emin misiniz?',
        'error' => 'Konum silinirken bir hata oluştu. Lütfen tekrar deneyin.',
        'success' => 'Konum silindi.',
    ],

    'bulkedit' => [
        'error' => 'Hiçbir alan değiştirilmedi, dolayısıyla hiç bir alan güncellenmedi.',
        'success' => 'Model başarıyla güncellendi. |:model_count modelleri başarıyla güncellendi.',
        'warn' => 'Edit the fields below to update this location. Fields you leave blank will not change on the location.|Edit the fields below to update all :count selected locations. Fields you leave blank will not change on any of them.',
        'show_selected' => '1 selected location|:count selected locations',
        'company_scope_mismatch_partial' => 'The company was not changed on 1 location because items or users at that location belong to different companies. Update or move those first.|The company was not changed on :count locations because items or users at those locations belong to different companies. Update or move those first.',
        'company_scope_mismatch_all' => 'No locations were reassigned. The requested company does not match items or users at the selected location.|No locations were reassigned. The requested company does not match items or users at any of the :count selected locations.',
        'parent_company_mismatch_partial' => 'The parent or company was not changed on 1 location because it would leave the location in a different company than its parent.|The parent or company was not changed on :count locations because it would leave those locations in a different company than their parent.',
        'parent_company_mismatch_all' => 'No changes were saved. The requested parent or company would leave the location in a different company than its parent.|No changes were saved. The requested parent or company would leave every one of the :count selected locations in a different company than their parent.',
    ],

];
