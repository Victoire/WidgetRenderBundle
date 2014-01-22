Victoire CMS Render Bundle
============

Need to add a render in a victoire cms website ?
Get this render bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require victoire/render-bundle

The render bundle handles Bootstrap and Foundation view.


Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\RenderBundle\VictoireWidgetRenderBundle(),
            );

            return $bundles;
        }
    }

[![Licence Creative Commons](http://i.creativecommons.org/l/by-nc-sa/3.0/fr/88x31.png)](http://creativecommons.org/licenses/by-nc-sa/3.0/fr/)

This product is provided under [Licence Creative Commns Attributions - No commercial use - Same conditions sharing 3.0 France](http://creativecommons.org/licenses/by-nc-sa/3.0/fr/) terms.
