<?php

return [
    'custom_fields'		        => 'Потребителски полета',
    'manage'                    => 'Управление',
    'field'		                => 'Поле',
    'about_fieldsets_title'		=> 'Относно Fieldsets',
    'about_fieldsets_text'		=> '"Група от полета" позволяват създаването на групи от персонализирани полета, които се използват и преизползват често за специфични типове модели на активи.',
    'custom_format'             => 'Персонализиран формат...',
    'encrypt_field'      	        => 'Шифроване на стойността на това поле в базата данни',
    'encrypt_field_help'      => 'ВНИМАНИЕ: Шифроване на поле го прави невалидно за търсене.',
    'encrypted'      	        => 'Шифровано',
    'fieldset'      	        => 'Fieldset',
    'qty_fields'      	      => 'Qty Fields',
    'fieldsets'      	        => 'Fieldsets',
    'fieldset_name'           => 'Fieldset имена',
    'field_name'              => 'Име на поле',
    'field_values'            => 'Стойност на поле',
    'field_values_help'       => 'Добавяне на избираеми опции, по една на ред. Празни редове, различни от първия ред ще бъдат пренебрегнати.',
    'field_element'           => 'Елемент на формуляра',
    'field_element_short'     => 'Елемент',
    'field_format'            => 'Формат',
    'field_custom_format'     => 'Персонализиран формат',
    'field_custom_format_help'     => 'Това поле позволява да използвате регулярен израз за валидация. За да го използвате, валидацията трябва да започва с "regex:" - например, за да потвърдите, че стойността на персонализираното поле съдържа валиден IMEI (15 цифри), можете да използвате <code>regex: / ^[0-9]{15}$ /</code>.',
    'required'   		          => 'Задължителен',
    'req'   		              => 'Req.',
    'used_by_models'   		    => 'Използвани от модели ',
    'order'   		            => 'Ред',
    'create_fieldset'         => 'Нов Fieldset',
    'update_fieldset'         => 'Обнови полетата',
    'fieldset_does_not_exist'   => 'Полето :id не съществува',
    'fieldset_updated'         => 'Полетата са обновени',
    'create_fieldset_title' => 'Създай нова група от полета',
    'create_field'            => 'Ново персонализирано поле',
    'create_field_title' => 'Създай ново персонализирано поле',
    'value_encrypted'      	        => 'Стойността на това поле е криптирана в базата данни. Само администратор потребители ще бъде в състояние да видят дешифрираната стойност',
    'show_in_email'     => 'Да се включи ли стойността на това поле в електронната поща, изпращана към потребителите? Криптираните полета не могат да бъдат включвани в изпращаните електронни пощи',
    'show_in_email_short' => 'Включи в е-майлите',
    'help_text' => 'Помощен текст',
    'help_text_description' => 'Това е допълнителен текст, който ще се появява под формата с елементите докато редактирате актив описващ значението на полето.',
    'about_custom_fields_title' => 'Отностно Персонализирани Полета',
    'about_custom_fields_text' => 'Персонализираните полета ви дават възможност да добавите атрибути към активите.',
    'add_field_to_fieldset' => 'Добави поле към група от полета',
    'make_optional' => 'Задължително - щракнете за да го направите незадължително',
    'make_required' => 'Незадължително - щракнете за да го направите задължително',
    'reorder' => 'Пренареждане',
    'db_field' => 'ДБ поле',
    'db_convert_warning' => 'ВНИМАНИЕ. Това поле в таблицата с потребителски полета е с колона <code>:db_column</code>,а трябва да бъде <code>:expected</code>.',
    'is_unique' => 'Тази стойност трябва да бъде уникална за всички активи',
    'unique' => 'Уникално',
    'display_in_user_view' => 'Позволи на потребителя да вижда тези стойности в страницата на зачислените активи',
    'display_in_user_view_table' => 'Видим за потребител',
    'auto_add_to_fieldsets' => 'Автоматично добави това към всеки нов набор от полета',
    'add_to_preexisting_fieldsets' => 'Добави към всички съществуващи набор от полета',
    'show_in_listview' => 'Показвай по подразбиране, като списък. Потребителите, ще имат възможност да го скрият/покажа през избор на колона',
    'show_in_listview_short' => 'Преглед в списъка',
    'show_in_requestable_list_short' => 'Покажи в списъка на изискуемите артикули',
    'show_in_requestable_list' => 'Покажи стойноста в списъка на изискуемите артикули. Криптираните полета няма да се покажат',
    'encrypted_options' => 'Това поле е криптирано, затова някой настройки няма да бъдат налични.',
    'display_checkin' => 'Покажи в форма за вписване',
    'display_checkout' => 'Покажи в форма за изписване',
    'display_audit' => 'Покажи в форма за одит',
    'types' => [
        'text' => 'Text Box',
        'listbox' => 'List Box',
        'textarea' => 'Textarea (multi-line)',
        'checkbox' => 'Checkbox',
        'radio' => 'Radio Buttons',
    ],
];
