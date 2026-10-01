<?php

return [

    'deleted' => 'Silinen varlık modeli',
    'does_not_exist' => 'Model mevcut değil.',
    'no_association' => 'UYARI! Bu öğeye ilişkin varlık modeli geçersiz veya eksik!',
    'no_association_fix' => 'Bu değişiklik bazı şeylerin garip ve tuhaf bir şekilde bozulmasına yol açabilir. Bu varlığı bir modelle ilişkilendirmek için düzeltin.',
    'assoc_users' => 'Model bir ya da daha çok demirbaş ile ilişkili ve silinemez. Lütfen demirbaşları silin ve tekrar deneyin. ',
    'invalid_category_type' => 'Kategori, bir varlık kategorisi olmak zorunda.',

    'create' => [
        'error' => 'Klasör oluşturulmadı, lütfen tekrar deneyin.',
        'success' => 'Model oluşturuldu.',
        'duplicate_set' => 'Bu üretici ve model numarası ile bir varlık ve model zaten var.',
    ],

    'update' => [
        'error' => 'Model güncellenemedi, lütfen tekrar deneyin',
        'success' => 'Model güncellendi.',
    ],

    'delete' => [
        'confirm' => 'Bu demirbaş modelini silmek istediğinize emin misiniz?',
        'error' => 'Demirbaş silinirken bir problem oluştu. Lütfen tekrar deneyin.',
        'success' => 'Model silindi.',
    ],

    'restore' => [
        'error' => 'Model geri getirilemedi, lütfen tekrar deneyin',
        'success' => 'Model geri getirildi.',
    ],

    'bulkedit' => [
        'error' => 'Hiçbir alan değiştirilmedi, dolayısıyla hiç bir alan güncellenmedi.',
        'success' => 'Model başarıyla güncellendi. |:model_count modelleri başarıyla güncellendi.',
        'warn' => 'Aşağıdaki modelin özelliklerini güncellemek üzeresiniz: |Aşağıdaki :model_count modellerinin özelliklerini düzenlemek üzeresiniz:',

    ],

    'bulkdelete' => [
        'error' => 'Hiçbir model seçilmedi, bu nedenle hiçbir şey silinmedi.',
        'nothing_deletable' => 'None of the selected models can be deleted because they still have assets associated with them.',
        'success' => 'Model silindi!|:success_count modelleri silindi!',
        'success_partial' => ':success_count adet model(ler) silindi, ancak :fail_count adet için silme işlemini tamamlayamadık, çünkü bunlar halâ varlıklarla ilişkilendirilmiş durumda.',
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
