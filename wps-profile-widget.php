<?php
     /**
     * Plugin Name: WP Symposium PRO Profile Widget
     * Plugin URI: http://www.wnccnwebdev.com
     * Description: A widget for displaying user profile information associated with WP Symposium Pro. The widget will allow you to display the user avatar in three different sizes, and user menu, display user friends and up to 6 additional shortcodes with tiles. No coding required.
     * Version: 15.7
     * Author: Michael Junker
     * Author URI: http://www.wnccnwebdev.com
     * License: GPL3
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
     */
    /**
     * Register the widget
     */
    function wpspprofwid_load_widgets() {
        register_widget( 'WPS_Pro_Profile_Widget' );
    }
    add_action( 'widgets_init', 'wpspprofwid_load_widgets' );


    /**
     * Profile Widget class.
     */
    class WPS_PRO_Profile_Widget extends WP_Widget {

        /**
         * Widget setup.
         */
        public function __construct() {
            $widget_ops = array( 'description' => __('Add a custom Profile to your sidebar.') );
            parent::__construct( 'nav_menu1', __('WPS PRO Profile Widget'), $widget_ops );
        }

	    // ********************** How to display Widget on Screen *******************************
	    public function widget($args, $instance) {

		    // THIS is where to ADD the code
		    if ( ! is_user_logged_in() ) {
			    /* ========================= Fifth Shortcode section start ==========================*/

			    //Set Shortcode 5 title
			    $sc5title = apply_filters( 'Shortcode 5 Title', $instance['sc5title'] );

			    //Display Shortcode 5 title
			    if ( ! empty( $sc5title ) )
				    echo $args['before_sc1title'] . "<h3>$sc5title</h3>" . $args['after_sc1title'];

			    //Do Shortcode 5
			    echo do_shortcode($instance['sc5']);

			    /* ========================= Sixth Shortcode section start =============================*/

			    //Set Shortcode 6 title
			    $sc6title = apply_filters( 'Shortcode 6 Title', $instance['sc6title'] );

			    //Display Shortcode 6 title
			    if ( ! empty( $sc6title ) )
				    echo $args['before_sc1title'] . "<h3>$sc6title</h3>" . $args['after_sc1title'];

			    //Do Shortcode 6
			    echo do_shortcode($instance['sc6']);

			    return;
		    }

		    // Set Title
		    $title = apply_filters( 'widget_title', $instance['title'] );

		    //Display Title
		    if ( ! empty( $title ) )
			    echo $args['before_title'] . $title . $args['after_title'];

		    /* ========================= Avatar image start ====================================*/

		    if($instance['avtar_size']=='1')
		    {

			    echo do_shortcode('[wps-avatar]') ;
			    echo "<br />";
		    }
		    /* ========================= Avatar image end ====================================*/
		    // Do Shortcodes

		    echo do_shortcode('[wps-friends-add-button after="<br />"]');


		    // ====================== Menu Display ==================================

		    //Set Menu title
		    $mtitle = apply_filters( 'Menu Title', $instance['mtitle'] );

		    //Display Title
		    if ( ! empty( $mtitle ) )
			    echo $args['before_mtitle'] . "<h3>$mtitle</h3>" . $args['after_mtitle'];

		    // Get menu
		    $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		    if($nav_menu != '')
		    {
			    wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );
		    }
		    /* ========================= Friends Message Button Shortcode start =====================*/

		    if($instance['friends_message_shortcode']=='on')
		    {
			    echo do_shortcode('[wps-mail-to-user after="<br />"]');
		    }

		    /* ========================= Friends shortcode start ====================================*/

		    if($instance['friends_shortcode']=='on')
		    {
			    echo "<p><h3>Friends</h3></p>";
			    echo do_shortcode('[wps-friends size="35" count=5]');
		    }

		    /* ========================= Friends Page URL start ==================================*/

		    echo '<p><a href="'.$instance ['friends_url'].'">'.$instance['fptitle'].'</a></p>';


		    /* ========================= First Shortcode section start ===================================*/
		    //Set Shortcode 1 title
		    $sc1title = apply_filters( 'Shortcode 1 Title', $instance['sc1title'] );

		    //Display Shortcode 1 title
		    if ( ! empty( $sc1title ) )
			    echo $args['before_sc1title'] . "<h3>$sc1title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 1
		    echo do_shortcode($instance['sc1']);
		    if ( ! empty( $sc1 ) )
			    echo "<br />";

		    /* ========================= Second Shortcode section start ===============================*/

		    //Set Shortcode 2 title
		    $sc2title = apply_filters( 'Shortcode 2 Title', $instance['sc2title'] );

		    //Display Shortcode 2 title
		    if ( ! empty( $sc2title ) )
			    echo $args['before_sc1title'] . "<h3>$sc2title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 2
		    echo do_shortcode($instance['sc2']);
		    if ( ! empty( $sc2 ) )
			    echo "<br />";

		    /* ========================= Third Shortcode section start =====================*/

		    //Set Shortcode 3 title
		    $sc3title = apply_filters( 'Shortcode 3 Title', $instance['sc3title'] );

		    //Display Shortcode 3 title
		    if ( ! empty( $sc3title ) )
			    echo $args['before_sc1title'] . "<h3>$sc3title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 3
		    echo do_shortcode($instance['sc3']);
		    if ( ! empty( $sc3 ) )
			    echo "<br />";

		    /* ========================= Fourth Shortcode section start ==========================*/

		    //Set Shortcode 4 title
		    $sc4title = apply_filters( 'Shortcode 4 Title', $instance['sc4title'] );

		    //Display Shortcode 4 title
		    if ( ! empty( $sc4title ) )
			    echo $args['before_sc1title'] . "<h3>$sc4title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 4
		    echo do_shortcode($instance['sc4']);
		    if ( ! empty( $sc4 ) )
			    echo "<br />";

		    /* ========================= Fifth Shortcode section start ==========================*/

		    //Set Shortcode 5 title
		    $sc5title = apply_filters( 'Shortcode 5 Title', $instance['sc5title'] );

		    //Display Shortcode 5 title
		    if ( ! empty( $sc5title ) )
			    echo $args['before_sc1title'] . "<h3>$sc5title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 5
		    echo do_shortcode($instance['sc5']);
		    if ( ! empty( $sc5 ) )
			    echo "<br />";

		    /* ========================= Sixth Shortcode section start =============================*/

		    //Set Shortcode 6 title
		    $sc6title = apply_filters( 'Shortcode 6 Title', $instance['sc6title'] );

		    //Display Shortcode 6 title
		    if ( ! empty( $sc6title ) )
			    echo $args['before_sc1title'] . "<h3>$sc6title</h3>" . $args['after_sc1title'];

		    //Do Shortcode 6
		    echo do_shortcode($instance['sc6']);
		    if ( ! empty( $sc6 ) )
			    echo "<br />";

		    //echo $args['after_widget'];
		    echo isset($after_widget) ? $after_widget : '';

	    }

	    // Update the widget settings.
	    public function update( $new_instance, $old_instance ) {
		    $instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		    $instance['avtar_size'] =  strip_tags( stripslashes($new_instance['avtar_size']) );
		    $instance['friends_message_shortcode'] = $new_instance['friends_message_shortcode'];
		    $instance['mtitle'] = strip_tags( stripslashes($new_instance['mtitle']) );
		    $instance['nav_menu'] = (int) $new_instance['nav_menu'];
		    $instance['friends_shortcode'] =  $new_instance['friends_shortcode'];
		    $instance['fptitle'] = strip_tags( stripslashes($new_instance['fptitle']) );
		    $instance['friends_url'] = strip_tags( stripslashes($new_instance['friends_url']) );
		    $instance['sc1title'] = strip_tags( stripslashes($new_instance['sc1title']) );
		    $instance['sc1'] = strip_tags( stripslashes($new_instance['sc1']) );
		    $instance['sc2title'] = strip_tags( stripslashes($new_instance['sc2title']) );
		    $instance['sc2'] = strip_tags( stripslashes($new_instance['sc2']) );
		    $instance['sc3title'] = strip_tags( stripslashes($new_instance['sc3title']) );
		    $instance['sc3'] = strip_tags( stripslashes($new_instance['sc3']) );
		    $instance['sc4title'] = strip_tags( stripslashes($new_instance['sc4title']) );
		    $instance['sc4'] = strip_tags( stripslashes($new_instance['sc4']) );
		    $instance['sc5title'] = strip_tags( stripslashes($new_instance['sc5title']) );
		    $instance['sc5'] = strip_tags( stripslashes($new_instance['sc5']) );
		    $instance['sc6title'] = strip_tags( stripslashes($new_instance['sc6title']) );
		    $instance['sc6'] = strip_tags( stripslashes($new_instance['sc6']) );
		    return $instance;
	    }

	    // =============== Displays widget in Admin Panel

	    public function form( $instance ) {
		    $title = isset( $instance['title'] ) ? $instance['title'] : '';
		    $avtar_size = isset( $instance['avtar_size'] ) ? $instance['avtar_size'] : '';
		    $friends_message_shortcode = isset( $instance['friends_message_shortcode'] ) ? $instance['friends_message_shortcode'] : '';
		    $mtitle = isset( $instance['mtitle'] ) ? $instance['mtitle'] : '';
		    $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		    $friends_shortcode = isset( $instance['friends_shortcode'] ) ? $instance['friends_shortcode'] : '';
		    $fptitle = isset( $instance['fptitle'] ) ? $instance['fptitle'] : '';
		    $friends_url = isset( $instance['friends_url'] ) ? $instance['friends_url'] : '';
		    $sc1title = isset( $instance['sc1title'] ) ? $instance['sc1title'] : '';
		    $sc1 = isset( $instance['sc1'] ) ? $instance['sc1'] : '';
		    $sc2title = isset( $instance['sc2title'] ) ? $instance['sc2title'] : '';
		    $sc2 = isset( $instance['sc2'] ) ? $instance['sc2'] : '';
		    $sc3title = isset( $instance['sc3title'] ) ? $instance['sc3title'] : '';
		    $sc3 = isset( $instance['sc3'] ) ? $instance['sc3'] : '';
		    $sc4title = isset( $instance['sc4title'] ) ? $instance['sc4title'] : '';
		    $sc4 = isset( $instance['sc4'] ) ? $instance['sc4'] : '';
		    $sc5title = isset( $instance['sc5title'] ) ? $instance['sc5title'] : '';
		    $sc5 = isset( $instance['sc5'] ) ? $instance['sc5'] : '';
		    $sc6title = isset( $instance['sc6title'] ) ? $instance['sc6title'] : '';
		    $sc6 = isset( $instance['sc6'] ) ? $instance['sc6'] : '';

		    // Get menus
		    $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		    // If no menus exists, direct the user to go and create some.
		    if ( !$menus ) {
			    echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			    return;
		    }
		    // ============= Widget Selections and inputs

		    ?>
		<p>
		<p><center>Visibility: Everything from here, including Shortcode 4 is visible to <div><strong>*** Logged IN users ONLY ***</strong></div></center></p>
		<p><a style="float:right;" href="http://www.wnccnwebdev.com/documentation/" target="_blank">Help Docs...</a></p>

		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wpspprofwid' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
		<div><center><u><strong>Sidebar Avatar Control:</strong></u></center></div>
		<div><center>Avatar size is now controlled via <font color='red'>WPS Pro => Shortcodes => Avatar => wps-avatar.</font></center></div><br />
		<label for="<?php echo $this->get_field_id( 'avtar_size' ); ?>"><?php _e( 'Sidebar Avatar: ' ); ?></label>
		<select id="<?php echo $this->get_field_id( 'avtar_size' ); ?>" name="<?php echo $this->get_field_name('avtar_size'); ?>">
			<option value=""> - No Avatar - </option>
			<?php
		    echo '<option value="1"'. selected( $avtar_size, '1', false ). '> - WPS Pro Control - </option>';

		    ?>
		</select>
		</p>
		<p>
		<div><center><font color='red'>Message Friends Button works ONLY with WP Symposium Pro Extensions</font></center></div>
		<label for="<?php echo $this->get_field_id( 'friends_message_shortcode' ); ?>"><?php _e( 'Show Message Friends Button: ' ); ?></label>
		<input class="checkbox" type="checkbox" <?php checked($friends_message_shortcode , 'on'); ?> id="<?php echo $this->get_field_id('friends_message_shortcode'); ?>" name="<?php echo $this->get_field_name('friends_message_shortcode'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'mtitle' ); ?>"><?php _e( 'User Menu Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('mtitle'); ?>" name="<?php echo $this->get_field_name('mtitle'); ?>" value="<?php echo $mtitle; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Set User Menu:' ); ?></label>
			<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
				<option value="">Select Menu</option>
				<?php
		    foreach ( $menus as $menu ) {
			    echo '<option value="' . $menu->term_id . '"'
				    . selected( $nav_menu, $menu->term_id, false )
				    . '>'. $menu->name . '</option>';
		    }
		    ?>
			</select>
		</p>
		<p>
		<div><center>Check Box to Show User Friends</center></div>
		<label for="<?php echo $this->get_field_id( 'friends_shortcode' ); ?>"><?php _e( 'Show Friends: ' ); ?></label>
		<input class="checkbox" type="checkbox" <?php checked($friends_shortcode , 'on'); ?> id="<?php echo $this->get_field_id('friends_shortcode'); ?>" name="<?php echo $this->get_field_name('friends_shortcode'); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fptitle' ); ?>"><?php _e( 'Friend Page Label - ex. See All Friends' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('fptitle'); ?>" name="<?php echo $this->get_field_name('fptitle'); ?>" value="<?php echo $fptitle; ?>" />
		</p>
		<p>
		<p><center><div>Link for Friends Page</div><div>- Leave <strong>BLANK</strong> for no link. -</div></center></p>
		<label for="<?php echo $this->get_field_id( 'friends_url' ); ?>"><?php _e( 'URL to Friends Page - ex. http://yoursite.com/friends' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('friends_url'); ?>" name="<?php echo $this->get_field_name('friends_url'); ?>" value="<?php echo $friends_url; ?>" />
		<p><center>Add Additional Shortcodes Below:</center></p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc1title' ); ?>"><?php _e( 'Shortcode 1 Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc1title'); ?>" name="<?php echo $this->get_field_name('sc1title'); ?>" value="<?php echo $sc1title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc1' ); ?>"><?php _e( 'Shortcode 1:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc1'); ?>" id="<?php echo $this->get_field_id('sc1'); ?>" class="widefat"><?php echo $sc1; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc1title' ); ?>"><?php _e( 'Shortcode 2 Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc2title'); ?>" name="<?php echo $this->get_field_name('sc2title'); ?>" value="<?php echo $sc2title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc2' ); ?>"><?php _e( 'Shortcode 2:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc2'); ?>" id="<?php echo $this->get_field_id('sc2'); ?>" class="widefat"><?php echo $sc2; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc3title' ); ?>"><?php _e( 'Shortcode 3 Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc3title'); ?>" name="<?php echo $this->get_field_name('sc3title'); ?>" value="<?php echo $sc3title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc3' ); ?>"><?php _e( 'Shortcode 3:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc3'); ?>" id="<?php echo $this->get_field_id('sc3'); ?>" class="widefat"><?php echo $sc3; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc4title' ); ?>"><?php _e( 'Shortcode 4 Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc4title'); ?>" name="<?php echo $this->get_field_name('sc4title'); ?>" value="<?php echo $sc4title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc4' ); ?>"><?php _e( 'Shortcode 4:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc4'); ?>" id="<?php echo $this->get_field_id('sc4'); ?>" class="widefat"><?php echo $sc4; ?></textarea>
		</p>
		<p>
		<p><center><div>Visibility:</div><div>Shortcode 5 and 6 are visible at <div><strong>*** ALL TIMES ***</strong></div></div></center></p>
		<label for="<?php echo $this->get_field_id( 'sc5title' ); ?>"><?php _e( 'Shortcode 5 Title:' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc5title'); ?>" name="<?php echo $this->get_field_name('sc5title'); ?>" value="<?php echo $sc5title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc5' ); ?>"><?php _e( 'Shortcode 5:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc5'); ?>" id="<?php echo $this->get_field_id('sc5'); ?>" class="widefat"><?php echo $sc5; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc6title' ); ?>"><?php _e( 'Shortcode 6 Title:' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('sc6title'); ?>" name="<?php echo $this->get_field_name('sc6title'); ?>" value="<?php echo $sc6title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sc6' ); ?>"><?php _e( 'Shortcode 6:' ); ?></label>
			<textarea name="<?php echo $this->get_field_name('sc6'); ?>" id="<?php echo $this->get_field_id('sc6'); ?>" class="widefat"><?php echo $sc6; ?></textarea>
		</p>
		<div><font color='red'>For a more secure Login plugin that is built for WPS Pro checkout </font></div>
		<div><a style="float:right;" href="http://www.wnccnwebdev.com/shop/wps-pro-login-plugin/" target="_blank">Premium WPS Login Plugin</a></div>
		<p></br></p>
	<?php
	    }
    }


?>