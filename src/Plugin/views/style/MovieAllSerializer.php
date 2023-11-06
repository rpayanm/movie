<?php

namespace Drupal\movie\Plugin\views\style;

use Drupal\rest\Plugin\views\style\Serializer;

/**
 * The style plugin for serialized output formats for the movie entity.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "movie_all_serializer",
 *   title = @Translation("Movie All Serializer"),
 *   help = @Translation("Serializes views row data using the Serializer component."),
 *   display_types = {"data"}
 * )
 */
class MovieAllSerializer extends Serializer {

  /**
   * {@inheritdoc}
   */
  public function render() {
    $rows = [];
    // If the Data Entity row plugin is used, this will be an array of entities
    // which will pass through Serializer to one of the registered Normalizers,
    // which will transform it to arrays/scalars. If the Data field row plugin
    // is used, $rows will not contain objects and will pass directly to the
    // Encoder.
    $a = $this->view->result;
    foreach ($this->view->result as $row_index => $row) {
      $this->view->row_index = $row_index;

      $entity = $row->_entity;
      $genders = [];
      foreach ($entity->get('genre') as $item) {
        $genders[] = $item->entity->label();
      }

      $rows[] = [
        'id' => $entity->id(),
        'title' => $entity->label(),
        'release_date' => $entity->release_date->value,
        'genre' => $genders,
      ];
    }
    unset($this->view->row_index);

    // Get the content type configured in the display or fallback to the
    // default.
    if ((empty($this->view->live_preview))) {
      $content_type = $this->displayHandler->getContentType();
    }
    else {
      $content_type = !empty($this->options['formats']) ? reset($this->options['formats']) : 'json';
    }
    return $this->serializer->serialize($rows, $content_type, ['views_style_plugin' => $this]);
  }

}