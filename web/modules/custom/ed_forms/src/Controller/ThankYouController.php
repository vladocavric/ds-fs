<?php
/**
 * Created by PhpStorm.
 * User: darko
 * Date: 2/4/19
 * Time: 12:07 PM
 */

namespace Drupal\ed_forms\Controller;

class ThankYouController {

    public function getPage($form_id) {
        $args = [
            'form_id' => $form_id,
        ];

        return [
            '#theme' => 'thank_you_page',
            '#data' => $args,
            '#cache' => [
                'max-age' => 10, // seconds
            ],
        ];
    }
}