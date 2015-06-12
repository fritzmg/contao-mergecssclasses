Contao Merge CSS Classes
===================

Small extension for Contao to automatically merge CSS classes in included elements.

By default, Contao ignores the CSS ID and class values defined in an element, when it is included via an include Content Element. So if you defined a CSS class in a module for example and then integrated this module via a Content Element on your page, its CSS class will not be used. Instead you have to define a CSS class in the Content Element itself.

You can change that behavior with this extension. The CSS classes will be merged together. For example, if you have a Module with a CSS class `elemA` and you include it in a Content Element with a CSS class `elemB`, the included element will have both CSS classes: `elemA elemB`. This behavior will also be used in Contao 4.

This extension also includes the CSS ID of the included element if present. So if the Module or Content Element to be included has a CSS ID defined, it will also be used in the include element. However, the include element's own CSS ID will be prioritized, if defined. This behavior will not be used in Contao 4, as far as I know.