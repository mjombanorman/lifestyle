<?php

use dosamigos\tinymce\TinyMce;
use kartik\form\ActiveForm;
use dosamigos\ckeditor\CKEditor;
?>

<?php

$form = ActiveForm::begin([
            'options' => [
                'enctype' => 'muli-part/formdata'
            ]
        ]);
?>
<?php

//
//$form->field($model, 'post_content')->widget(TinyMce::className(), [
//    'options' => ['rows' => 15],
//    'language' => 'en',
//    'clientOptions' => [
//        'plugins' => [
//            "advlist autolink lists link charmap print preview anchor",
//            "searchreplace visualblocks code fullscreen",
//            "insertdatetime media table contextmenu paste"
//        ],
//        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
//    ]
//]);
?>
<?php

//$form->field($model, 'post_content')->widget(CKEditor::className(), [
//    'options' => ['rows' => 6],
//    'preset' => 'basic'
//])
?>
<?php

echo froala\froalaeditor\FroalaEditorWidget::widget([
    'name' => 'post_content',
    'options' => [
        // html attributes
        'id' => 'content'
    ],
    'clientOptions' => [
        'toolbarInline' => false,
        'theme' => 'royal', //optional: dark, red, gray, royal
        'language' => 'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
    ]
]);
?>
<?php

ActiveForm::end()?>