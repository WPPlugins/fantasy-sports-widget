<?php
/**
*Plugin Name: Fantasy Sports Widget
*Plugin URI: https://fantasyknuckleheads.com/subscribe/fantasy-sports-widget/
*Description: Fantasy Sports RSS Network
*Author: Kurt Turner
*Version: 3.0
*Author URI: https://fantasyknuckleheads.com
*
*Special thanks to Ryan McCue @ rotorised.com for the Simplepie support.
*
*This program is distributed in the hope that it will be useful,
*but WITHOUT ANY WARRANTY; without even the implied warranty of
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
add_action( 'widgets_init', 'fantasy_load_widgets' );
function fantasy_load_widgets() {
        register_widget( 'fantasy_Widget' );
}
class Fantasy_Widget extends WP_Widget {
        function Fantasy_Widget() {
                /* Widget settings. */
                $widget_ops = array( 'classname' => 'fantasy', 'description' => __('Displays The Best Fantasy Sports News and Advice from around the web.', 'fantasy') );
                /* Widget control settings. */
                $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'fantasy-widget' );
                /* Create the widget. */
                $this->WP_Widget( 'fantasy-widget', __('Fantasy Sports Widget', 'fantasy'), $widget_ops, $control_ops );
        }
        /**
         * How to display the widget on the screen.
         */
        function widget( $args, $instance ) {
                extract( $args );
                /* Our variables from the widget settings. */
				$authorcredit	= isset($instance['author_credit']) ? $instance['author_credit'] : false ; // give plugin author credit
                /* Before widget (defined by themes). */
  echo $before_widget . $before_title . 'Fantasy Blog Network' . $after_title;
                   echo ('<a target="_blank" href="https://fantasyknuckleheads.com/subscribe/fantasy-sports-widget/" title="Get this widget for your website and deliver your readers the best Fantasy Sports content from around the web. This is the hottest Fantasy Sports widget on the market containing fantasy football rankings, news and advice."><small>Get This</small></a><iframe longdesc="Home of the one and only Fantasy Sports Widget. Fantasy Knuckleheads is a great source for Fantasy Football rankings, waiver wire, news, start sit and sleepers" title="Home of the one and only Fantasy Sports Widget. Fantasy Knuckleheads is a great source for Fantasy Football rankings, sleepers and Fantasy Baseball News and Advice." id="Fantasy Football" frameBorder="0" scrolling=no width="100%" frameborder="0" height="304px" src="https://fantasyknuckleheads.com/mashed/feedframecameleon.html"></iframe><noframes> 
<a href="https://fantasyknuckleheads.com" title="Fantasy Football Rankings"><b>Fantasy Football for all you knuckleheads</b></a>
</noframes>'); 
                /* If show powered was selected, display the user's powered. */
                if ( $authorcredit )
                        printf( '<p>' . __('<small>Powered By: </small><a target="_blank" href="https://fantasyknuckleheads.com" title="Fantasy football"><b>Fantasy Knuckleheads</b></a>', 'fantasy.') . '</p>' );
                /* After widget (defined by themes). */
                echo $after_widget;
        }
        /**
         * Update the widget settings.
         */
        function update( $new_instance, $old_instance ) {
                $instance = $old_instance;
$instance['author_credit'] = $new_instance['author_credit'];
			return $instance;
        }
        /**
         * Displays the widget settings controls on the widget panel.
         * Make use of the get_field_id() and get_field_name() function
         * when creating your form elements. This handles the confusing stuff.
         */	 
function form( $instance ) {
                /* Set up some default widget settings. */
                 $defaults = array( 'title' => __('Fantasy', 'fantasy'), 'authorcredit' => __('false', 'author_credit'), 'authorcredit' => 'false', 'author_credit' => off );
$instance = wp_parse_args( (array) $instance, $defaults ); ?>
                <!-- Show Powered by? -->
<p><input class="checkbox" type="checkbox" <?php checked( $instance['author_credit'], on ); ?> id="<?php echo $this->get_field_id( 'author_credit' ); ?>" name="<?php echo $this->get_field_name( 'author_credit' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'author_credit' ); ?>">Check to be included into network AND show Powered by Link</label> 
</p>
        <?php
        }
}
?>