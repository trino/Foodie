<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/cuisine/*', ['controller' => 'Pages', 'action' => 'cuisine']);
    $routes->connect('/restaurants/order_ajax', ['controller' => 'Restaurants', 'action' => 'order_ajax']);

    $routes->connect('/restaurants/employees', ['controller' => 'Restaurants', 'action' => 'employees']);
    $routes->connect('/restaurants/eventlog', ['controller' => 'Restaurants', 'action' => 'eventlog']);
    $routes->connect('/restaurants/dashboard', ['controller' => 'Restaurants', 'action' => 'dashboard']);
    $routes->connect('/restaurants/menu_manager', ['controller' => 'Restaurants', 'action' => 'menu_manager']);
    $routes->connect('/restaurants/additional', ['controller' => 'Restaurants', 'action' => 'additional']);
    $routes->connect('/restaurants/menu_form', ['controller' => 'Restaurants', 'action' => 'menu_form']);
    $routes->connect('/restaurants/orders/*', ['controller' => 'Restaurants', 'action' => 'orders']);
    $routes->connect('/restaurants/report/*', ['controller' => 'Restaurants', 'action' => 'report']);
    $routes->connect('/restaurants/signup', ['controller' => 'Restaurants', 'action' => 'signup']);
    $routes->connect('/restaurants/restaurants', ['controller' => 'Restaurants', 'action' => 'restaurants']);
    $routes->connect('/restaurants/newsletter', ['controller' => 'Restaurants', 'action' => 'newsletter']);
    $routes->connect('/restaurants/addresses', ['controller' => 'Restaurants', 'action' => 'addresses']);
    $routes->connect('/restaurants/delete_order/*', ['controller' => 'Restaurants', 'action' => 'delete_order']);
    $routes->connect('/restaurants/approve_order/*', ['controller' => 'Restaurants', 'action' => 'approve_order']);
    $routes->connect('/restaurants/cancel_order/*', ['controller' => 'Restaurants', 'action' => 'cancel_order']);
    $routes->connect('/restaurants/order_detail/*', ['controller' => 'Restaurants', 'action' => 'order_detail']);
    $routes->connect('/restaurants/edit_order/*', ['controller' => 'Restaurants', 'action' => 'edit_order']);

    $routes->connect('/restaurants/all/*', ['controller' => 'Restaurants', 'action' => 'all']);
    $routes->connect('/restaurants/*', ['controller' => 'Restaurants', 'action' => 'index']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
