# Movie module
This module provides a movie content type and a movie view that lists all 
movies in a restful way.

## Installation
1. Compile the assets (check below).
2. Install the module as usual `drush en movie`.
3. Clear the cache `drush cr`.

## Restful URL
The restful URL is `/api/v1/movie/all?_format=json`.
The format can be changed to `xml`: `/api/v1/movie/all?_format=xml`.

## Styleguide

### How to use
1. Work on any modifications in the `assets/scss` or `assets/js` folders.
2. Compile/Watch the assets (check below).

### Initial setup
1. Install [nvm](https://github.com/nvm-sh/nvm#installing-and-updating).
2. Install node `nvm install`.
3. Install dependencies `npm install`.

### Compile assets
`npx mix`.

### Watch assets
`npx mix watch`.
