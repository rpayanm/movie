/**
 * @file
 * Movie form behaviors.
 */
(function (Drupal, once) {

  'use strict';

  Drupal.behaviors.movieMovieForm = {
    attach (context, settings) {
      // Highlight the release_date field in red if the inputted date is in the
      // future.
      const releaseDateEl = '#edit-release-date-0-value-date';
      once('release-date-validation', releaseDateEl, context).forEach((releaseDate) => {
        if (releaseDate) {
          releaseDate.addEventListener('change', function () {
            const today = new Date();
            const releaseDate = new Date(this.value);
            if (releaseDate > today) {
              this.classList.add('error');
            }
            else {
              this.classList.remove('error');
            }
          });
        }
      });
    }
  };

} (Drupal, once));
