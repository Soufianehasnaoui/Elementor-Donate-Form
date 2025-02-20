<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class unissons_donation_Widget extends Widget_Base {

    public function get_style_depends(): array {
		return [ 'widget-unissons-donation-style' ,'fontawesome'];
	}
    public function get_script_depends(): array {
		return [ 'widget-unissons-donation-script' ];
	}
    public function get_name() {
        return 'unissons_donation_Widget';
    }
    public function get_title() {
        return __( 'Donation Widget', 'text-domain' );
    }
    public function get_icon() {
        return 'eicon-form-horizontal';
    }
    public function get_categories() {
        return [ 'unissons' ];
    }
    protected function _register_controls() {
    }
    protected function render() {
        ?>
        <div class="container-donation">
            <div class="header-container">
                <h2>Faire un don</h2>
                <!-- <div class="taggle-button">
                    <span class="active"></span>
                    <span class="left">Une fois</span>
                    <span class="right">Mensuelle</span>
                </div> -->
            </div>
            <div class="form-donation">
                <div class="left-form-donation">
                    <div class="list-amount">
                        <span class="active" data-amount="20">20 euro</span>
                        <span data-amount="50">50 euro</span>
                        <span data-amount="100">100 euro</span>
                        <span data-amount="">Autre montant</span>
                    </div>
                    <div class="custom-amount">
                        <input type="text" name="amount" id="amount" placeholder="Enter amount">
                    </div>
                    <div class="description">
                        <p>Que cela soit une Sadaqa Jariya bénéfique pour vous et votre famille. Pour en savoir plus sur la <a href="https://slateblue-crocodile-119423.hostingersite.com/sadaqa-jariya/"> Sadaqa Jariya (l'aumône continue) </a> </p>
                        <label class="cr-wrapper">
                            <input type="checkbox" checked="checked"/>
                            <div class="cr-input"></div>
                            <span>Je confirme avoir lu et accepté les <a href="#">termes et conditions du don</a></span>
                        </label>
                    </div>
                </div>
                <div class="right-form-donation">
                    <h3>Ensemble, changeons des vies durablement</h3>
                    <div class="form-info">
                        <input type="text" name="name" id="name" placeholder="Veuillez mentionner correctement votre nom">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <input type="text" name="numberphone" id="numberphone" placeholder="Votre numéro de téléphone">
                        <textarea rows="5" name="note" id="note" placeholder=""></textarea>
                        <input type="submit" value="Faire un don" id="donation-button">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    protected function _content_template() {
        ?>
        <div class="container-donation">
            <div class="header-container">
                <h2>Faire un don</h2>
                <div class="taggle-button">
                    <span class="active"></span>
                    <span class="left">Une fois</span>
                    <span class="right">Mensuelle</span>
                </div>
            </div>
            <div class="form-donation">
                <div class="left-form-donation">
                    <div class="list-amount">
                        <span class="active" data-amount="20">20 euro</span>
                        <span data-amount="50">50 euro</span>
                        <span data-amount="100">100 euro</span>
                        <span data-amount="">Autre montant</span>
                    </div>
                    <div class="custom-amount">
                        <input type="text" name="amount" id="amount" placeholder="Enter amount">
                    </div>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet...</p>
                        <label class="cr-wrapper">
                            <input type="checkbox" checked="checked"/>
                            <div class="cr-input"></div>
                            <span>Je confirme avoir lu et accepté les <a href="#">termes et conditions du don</a></span>
                        </label>
                    </div>
                </div>
                <div class="right-form-donation">
                    <h3>Ensemble, changeons des vies durablement</h3>
                    <div class="form-info">
                        <input type="text" name="name" id="name" placeholder="Votre nom">
                        <input type="email" name="email" id="email" placeholder="Email">
                        <input type="text" name="numberphone" id="numberphone" placeholder="Votre numéro de téléphone">
                        <textarea rows="5" name="note" id="note" placeholder=""></textarea>
                        <input type="submit" value="Faire un don" id="donation-button">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
