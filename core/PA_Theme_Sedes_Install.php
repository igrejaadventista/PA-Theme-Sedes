<?php

require_once(dirname(__FILE__) . '/PA_Sync_Taxonomy.php');
require_once(dirname(__FILE__) . '/utils/PA_RestAPI_Tax.php');

/**
 * 
 * Bootloader Install
 * 
 */

class PACoreInstall
{
    public function __construct()
    {
        /**
         * 
         * Register taxonomys 
         * 
         */

        add_action('after_setup_theme', array($this, 'installRoutines'));
    }

    function installRoutines()
    {
        // Install routine to create or update taxonomies
        if (!wp_next_scheduled('PARoutineTaxonomies')) {
            wp_schedule_event(time(), '20min', 'PARoutineTaxonomies');
        }


        //Configure at instance wordpress
        $labels = array(
            'name'              => _x('Sedes Proprietárias', 'nome da taxonomia'),
            'singular_name'     => _x('Sede Proprietária', 'nome da taxonomia no singular'),
            'search_items'      => __('Procurar Sedes Proprietárias'),
            'all_items'         => __('Todas as Sedes'),
            'parent_item'       => __('Subsede proprietária'),
            'parent_item_colon' => __('Sede proprientária pai'),
            'edit_item'         => __('Editar Sede Proprietária'),
            'update_item'       => __('Atualizar Sede Proprietária'),
            'add_new_item'      => __('Add Nova Sede Proprietária'),
            'new_item_name'     => __('Nova Sede Proprietária'),
            'menu_name'         => __('Sedes Proprietárias'),
        );
        $args   = array(
            'hierarchical'      => true, // make it hierarchical (like categories)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'xtt-pa-owner'],
        );
        register_taxonomy('xtt-pa-owner', ['post'], $args);


        /***
         * 
         * TODO:
         * Tests
         * 
         */

        // $restAPIService = new PARestAPITax();
        // $resultService = $restAPIService->CallAPI('GET', 'xtt-pa-owner?per_page=100');

        // echo '<br><br><br><br><br><br><br><br><br>';

        // foreach ($resultService as $result) {


        //     wp_insert_term(
        //         $result->name, // the term 
        //         'xtt-pa-owner', // the taxonomy
        //         array(
        //             'term_id' => $result->id,
        //             'description' => $result->description,
        //             'slug' => $result->slug,
        //             'parent' => $result->parent  // get numeric term id
        //         )
        //     );
        // }

        
    }
}

$PACoreInstall = new PACoreInstall();