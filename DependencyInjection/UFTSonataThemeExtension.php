<?php

namespace App\UFT\SonataThemeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class UFTSonataThemeExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundleConfiguration = $container->getExtensionConfig('uft_sonata_theme')[0];

        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['SonataAdminBundle'])) {
            $config = [
                'templates' => [
                    'user_block'                 => '@UFTSonataTheme/Core/user_block.html.twig',
                    'add_block'                  => '@UFTSonataTheme/Core/add_block.html.twig',
                    'layout'                     => '@UFTSonataTheme/standard_layout.html.twig',
                    'ajax'                       => '@UFTSonataTheme/ajax_layout.html.twig',
                    'dashboard'                  => '@UFTSonataTheme/Core/dashboard.html.twig',
                    'search'                     => '@UFTSonataTheme/Core/search.html.twig',
                    'list'                       => '@UFTSonataTheme/CRUD/list.html.twig',
                    'filter'                     => '@UFTSonataTheme/Form/filter_admin_fields.html.twig',
                    'show'                       => '@UFTSonataTheme/CRUD/show.html.twig',
                    'show_compare'               => '@UFTSonataTheme/CRUD/show_compare.html.twig',
                    'edit'                       => '@UFTSonataTheme/CRUD/edit.html.twig',
                    'preview'                    => '@UFTSonataTheme/CRUD/preview.html.twig',
                    'history'                    => '@UFTSonataTheme/CRUD/history.html.twig',
                    'acl'                        => '@UFTSonataTheme/CRUD/acl.html.twig',
                    'history_revision_timestamp' => '@UFTSonataTheme/CRUD/history_revision_timestamp.html.twig',
                    'action'                     => '@UFTSonataTheme/CRUD/action.html.twig',
                    'select'                     => '@UFTSonataTheme/CRUD/list__select.html.twig',
                    'list_block'                 => '@UFTSonataTheme/Block/block_admin_list.html.twig',
                    'search_result_block'        => '@UFTSonataTheme/Block/block_search_result.html.twig',
                    'short_object_description'   => '@UFTSonataTheme/Helper/short-object-description.html.twig',
                    'delete'                     => '@UFTSonataTheme/CRUD/delete.html.twig',
                    'batch'                      => '@UFTSonataTheme/CRUD/list__batch.html.twig',
                    'batch_confirmation'         => '@UFTSonataTheme/CRUD/batch_confirmation.html.twig',
                    'inner_list_row'             => '@UFTSonataTheme/CRUD/list_inner_row.html.twig',
                    'outer_list_rows_mosaic'     => '@UFTSonataTheme/CRUD/list_outer_rows_mosaic.html.twig',
                    'outer_list_rows_list'       => '@UFTSonataTheme/CRUD/list_outer_rows_list.html.twig',
                    'outer_list_rows_tree'       => '@UFTSonataTheme/CRUD/list_outer_rows_tree.html.twig',
                    'base_list_field'            => '@UFTSonataTheme/CRUD/base_list_field.html.twig',
                    'pager_links'                => '@UFTSonataTheme/Pager/links.html.twig',
                    'pager_results'              => '@UFTSonataTheme/Pager/results.html.twig',
                    'tab_menu_template'          => '@UFTSonataTheme/Core/tab_menu_template.html.twig',
                    'knp_menu_template'          => '@UFTSonataTheme/Menu/sonata_menu.html.twig',
                ],
                'assets'    => [
                    'stylesheets' => [
                        'bundles/uftsonatatheme/css/bootstrap.min.css',
                        'bundles/uftsonatatheme/css/font-awesome.min.css',
                        'bundles/uftsonatatheme/css/icheck.css',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                        'bundles/sonatacore/vendor/select2/select2.css',
                        'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css',
                        'bundles/uftsonatatheme/css/prettify.min.css',
                        'bundles/uftsonatatheme/css/custom.min.css',
                        'bundles/uftsonatatheme/css/sonata-gentelella.css',
                    ],
                    'javascripts' => [
//                        'bundles/uftsonatatheme/js/jquery.min.js',
                        /* JQuery has been moved in header. This is bad, but necessary until https://github.com/sonata-project/SonataAdminBundle/pull/3647 complete.
                         * This will be cleaned up with the version 4.0 of sonata admin */

                        'bundles/sonataadmin/vendor/jquery.scrollTo/jquery.scrollTo.min.js',
                        'bundles/uftsonatatheme/js/moment.min.js',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/jquery-ui.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/i18n/jquery-ui-i18n.min.js',
                        'bundles/uftsonatatheme/js/bootstrap.min.js',
                        'bundles/sonataadmin/vendor/jquery-form/jquery.form.js',
                        'bundles/sonataadmin/jquery/jquery.confirmExit.js',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
                        'bundles/sonatacore/vendor/select2/select2.min.js',
                        'bundles/sonataadmin/vendor/iCheck/icheck.min.js',
                        'bundles/sonataadmin/vendor/slimScroll/jquery.slimscroll.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/jquery.waypoints.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/shortcuts/sticky.min.js',
                        'bundles/sonataadmin/vendor/readmore-js/readmore.min.js',
                        'bundles/sonataadmin/Admin.js',
                        'bundles/sonataadmin/treeview.js',
                        'bundles/uftsonatatheme/js/menu.js',
                    ],
                ],
            ];

            if (isset($bundleConfiguration['fast_click'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/fastclick.js';
            }

            if (isset($bundleConfiguration['nprogress'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/nprogress.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/nprogress.css';
            }

            if (isset($bundleConfiguration['chart'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/Chart.min.js';
            }

            if (isset($bundleConfiguration['gauge'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/gauge.min.js';
            }

            if (isset($bundleConfiguration['bootstrap_progressbar'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/bootstrap-progressbar.min.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/bootstrap-progressbar-3.3.4.min.css';
            }

            if (isset($bundleConfiguration['skycons'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/skycons.js';
            }

            if (isset($bundleConfiguration['flot'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.pie.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.time.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.stack.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.resize.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.orderBars.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.flot.spline.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/curvedLines.js';
            }

            if (isset($bundleConfiguration['datejs'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/date.js';
            }

            if (isset($bundleConfiguration['jqvmap'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.vmap.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.vmap.world.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.vmap.sampledata.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/jqvmap.min.css';
            }

            if (isset($bundleConfiguration['bootstrap_daterangerpicker'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/daterangepicker.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/daterangepicker.css';
            }

            if (isset($bundleConfiguration['calendar'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/fullcalendar.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/fullcalendar-locale-all.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/fullcalendar.min.css';
            }

            if (isset($bundleConfiguration['echarts'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/echarts.min.js';
            }

            if (isset($bundleConfiguration['switchery'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/switchery.min.css';
            }

            if (isset($bundleConfiguration['starrr'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/starrr.css';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/starrr.js';
            }

            if (isset($bundleConfiguration['parsley'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/parsley.min.js';
            }

            if (isset($bundleConfiguration['autosize'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/autosize.min.js';
            }

            if (isset($bundleConfiguration['jquery_autocomplete'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.autocomplete.min.js';
            }

            if (isset($bundleConfiguration['jquery_tag_input'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.tagsinput.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/jquery.tagsinput.css';
            }

            if (isset($bundleConfiguration['bootstrap_wysiwyg'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/prettify.min.css';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/bootstrap-wysiwyg.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.hotkeys.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/prettify.js';
            }

            if (isset($bundleConfiguration['ion_rangeslider'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/ion.rangeSlider.min.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/normalize.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/ion.rangeSlider.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/ion.rangeSlider.skinFlat.css';
            }

            if (isset($bundleConfiguration['bootstrap_colorpicker'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/bootstrap-colorpicker.min.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/bootstrap-colorpicker.min.css';
            }

            if (isset($bundleConfiguration['cropper'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/cropper.min.css';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/cropper.min.js';
            }

            if (isset($bundleConfiguration['jquery_inputmask'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.inputmask.bundle.min.js';
            }

            if (isset($bundleConfiguration['jquery_knob'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.knob.min.js';
            }

            if (isset($bundleConfiguration['dropzone'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dropzone.min.js';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/dropzone.min.css';
            }

            if (isset($bundleConfiguration['validator'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/validator.js';
            }

            if (isset($bundleConfiguration['jquery_smart_wizard'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.smartWizard.js';
            }

            if (isset($bundleConfiguration['pnotify'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/pnotify.custom.min.css';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/pnotify.custom.min.js';
            }

            if (isset($bundleConfiguration['jquery_sparklines'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.sparkline.min.js';
            }

            if (isset($bundleConfiguration['morris'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/raphael.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/morris.min.js';
            }

            if (isset($bundleConfiguration['animate'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/animate.min.css';
            }

            if (isset($bundleConfiguration['easy_pie_chart'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.easypiechart.min.js';
            }

            if (isset($bundleConfiguration['echarts'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/echarts.min.js';
            }

            if (isset($bundleConfiguration['datatables'])) {
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/dataTables.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/buttons.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/fixedHeader.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/responsive.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/uftsonatatheme/css/scroller.bootstrap.min.css';

                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jquery.dataTables.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.bootstrap.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.buttons.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/buttons.bootstrap.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/buttons.flash.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/buttons.html5.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/buttons.print.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.fixedHeader.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.keyTable.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.responsive.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/responsive.bootstrap.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/dataTables.scroller.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/jszip.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/pdfmake.min.js';
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/vfs_fonts.js';
            }

            if (isset($bundleConfiguration['demo'])) {
                $config['assets']['javascripts'][] = 'bundles/uftsonatatheme/js/custom.js';
            }

            $container->prependExtensionConfig('sonata_admin', $config);
        }
    }
}
