<?php

class formWidgetTemplateOptions extends cmsForm {

    public function init($options, $template_name) {

        return [
            [
                'type'   => 'fieldset',
                'title'  => LANG_OPTIONS,
                'childs' => [
                    new fieldList('options:type', [
                        'title' => LANG_WD_T_TYPE,
                        'hint'  => LANG_WD_T_TYPE_HINT,
                        'items' => [
                            'body'        => LANG_PAGE_BODY,
                            'breadcrumbs' => LANG_PAGE_BREADCRUMB,
                            'smessages'   => LANG_WD_T_SMESSAGES,
                            'copyright'   => LANG_WD_T_COPYRIGHT,
                            'logo'        => LANG_WD_T_LOGO,
                            'site_closed' => LANG_WD_T_SITE_CLOSED,
                            'lang_select' => LANG_WD_T_LANG_SELECT
                        ]
                    ]),
                    new fieldList('options:session_type', [
                        'title'          => LANG_WD_T_SESSION_TYPE,
                        'items'          => [
                            'on_position' => LANG_WD_T_SESSION_TYPE1,
                            'toastr'      => LANG_WD_T_SESSION_TYPE2
                        ],
                        'visible_depend' => ['options:type' => ['show' => ['smessages']]]
                    ]),
                    new fieldList('options:logo:file', [
                        'title'     => LANG_WD_T_LOGO_FILE,
                        'hint'      => LANG_WD_T_LOGO_FILE_HINT,
                        'generator' => function ($item) use ($template_name) {

                            $files = cmsCore::getFilesList(cmsTemplate::TEMPLATE_BASE_PATH . $template_name . '/images', '*logo*.*');

                            $files = array_combine($files, $files);

                            return ['' => ''] + $files;
                        },
                        'visible_depend' => ['options:type' => ['show' => ['logo']]]
                    ]),
                    new fieldList('options:logo:file_small', [
                        'title'     => LANG_WD_T_LOGO_FILE_SMALL,
                        'hint'      => LANG_WD_T_LOGO_FILE_HINT,
                        'generator' => function ($item) use ($template_name) {

                            $files = cmsCore::getFilesList(cmsTemplate::TEMPLATE_BASE_PATH . $template_name . '/images', '*logo*.*');

                            $files = array_combine($files, $files);

                            return ['' => ''] + $files;
                        },
                        'visible_depend' => ['options:type' => ['show' => ['logo']]]
                    ]),
                    new fieldList('options:breadcrumbs:template', [
                        'title'     => LANG_WD_T_BTEMPLATE,
                        'hint'      => LANG_WD_T_BTEMPLATE_HINT,
                        'generator' => function ($item) use ($template_name) {
                            return cmsTemplate::getInstance()->getAvailableTemplatesFiles('assets/ui', 'breadcrumbs*.tpl.php', $template_name);
                        },
                        'visible_depend' => ['options:type' => ['show' => ['breadcrumbs']]]
                    ]),
                    new fieldCheckbox('options:breadcrumbs:strip_last', [
                        'title'          => LANG_WD_T_STRIP_LAST,
                        'visible_depend' => ['options:type' => ['show' => ['breadcrumbs']]]
                    ])
                ]
            ]
        ];
    }

}
