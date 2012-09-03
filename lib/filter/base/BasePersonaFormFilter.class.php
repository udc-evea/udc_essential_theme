<?php

/**
 * Persona filter form base class.
 *
 * @package    tesina_udc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'estado_id'           => new sfWidgetFormPropelChoice(array('model' => 'EstadoPersona', 'add_empty' => true)),
      'direccion_postal_id' => new sfWidgetFormPropelChoice(array('model' => 'Direccion', 'add_empty' => true)),
      'direccion_real_id'   => new sfWidgetFormPropelChoice(array('model' => 'Direccion', 'add_empty' => true)),
      'cuit_cuil'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'estado_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'EstadoPersona', 'column' => 'id_estado_persona')),
      'direccion_postal_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Direccion', 'column' => 'id_direccion')),
      'direccion_real_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Direccion', 'column' => 'id_direccion')),
      'cuit_cuil'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }

  public function getFields()
  {
    return array(
      'id_persona'          => 'Number',
      'estado_id'           => 'ForeignKey',
      'direccion_postal_id' => 'ForeignKey',
      'direccion_real_id'   => 'ForeignKey',
      'cuit_cuil'           => 'Number',
    );
  }
}
