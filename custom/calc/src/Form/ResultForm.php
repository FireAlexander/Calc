<?php
/**
 * @file
 * Contains \Drupal\calc\Form\ResultForm.
 */
namespace Drupal\calc\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;

class ResultForm extends FormBase {
    /**
     * {@inheritdoc}.
     */

    public function getFormId() {
        return 'result_form';
    }
    /**
     * {@inheritdoc}.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['operand1'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Enter operand 1')
        );

        $form['operand2'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Enter operand 2')
        );

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array (
            '#type' => 'submit',
            '#value' => $this->t('Result'),
            '#button_type' => 'primaty',
        );
        return $form;
    }
    /**
     * {@inheritdoc}.
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if ($form_state->getValue('operand1') == '0') {
            $form_state->setErrorByName('name',$this->t('Its work error'));
        }

    }
    /**
     * {@inheritdoc}.
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
    /**    drupal_set_message($this->t('Good @operand1 and @operand2', array(
     *       '@operand1' => $form_state->getValue('operand1'),
     *       '@operand2' => $form_state->getValue('operand2')
     *   )),'status');
     **/
        $message = 'operand1 =' . $form_state->getValue('operand1') . ' , operand2 = ' . $form_state->getValue('operand2');
        \Drupal::messenger()->addMessage($message);
        //  $form_state->setRedirectUrl($this->getCancelUrl());
    }
}