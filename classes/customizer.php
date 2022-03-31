<?php
class Marketpress_Customizer_Color_Scheme extends WP_Customize_Control
{

    protected $schemes, $default_scheme;

    /**
     * Constructor.
     *
     * @param	WP_Customize_Manager $manager
     * @param	String $id
     * @param	Array $args
     * @return	Void
     */
    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        $this->schemes        = $args['schemes'];
        $this->default_scheme    = $args['default'];
        parent::__construct($manager, $id, $args);
    }

    /**
     * Callback to render the Content in our Customizer-Panel
     *
     * @return Void
     */
    public function render_content()
    {
        $current = get_theme_mod($this->id, $this->default_scheme);
?>
    


        <?php
        foreach ($this->schemes as $key => $values) {
            echo '';
            echo $this->get_radio($key, $values, $current);
            echo '';
        }
        ?>
        


    <?php
    }

    /**
     * Generate a radio-button
     *
     * @param	String $key
     * @param	Array $values
     * @param	String $current
     *
     * @return	String $output
     */
    protected function get_radio($key, array $values, $current)
    {
        $output = sprintf(
            ' %6$s',
            "$this->id-$key",
            $values['foreground'],
            $values['background'],
            $this->id,
            checked($key, $current, FALSE),
            esc_html($values['label']),
            $key,
            $this->get_link()
        );
        return $output;
    }
}
