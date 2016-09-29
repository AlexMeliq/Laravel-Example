<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    design
 * @package     rwd_default
 * @copyright   Copyright (c) 2006-2014 X.commerce, Inc. (http://www.magento.com)
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
?>
<?php /** @var $this Mage_Checkout_Block_Cart_Shipping */ ?>
<div class="shipping">
    <h2><?php echo $this->__('Please select your destination to get Tax rate') ?></h2>
    <div class="shipping-form">
        <form action="<?php echo $this->getUrl('checkout/cart/estimatePost') ?>" method="post" id="shipping-zip-form">
            <p class="shipping-desc"><?php echo $this->__('Enter your destination to get a shipping estimate.') ?></p>
            <ul class="form-list">
                <li class="shipping-country">
                    <label for="country" class="required"><em>*</em><?php echo $this->__('Country') ?></label>
                    <div class="input-box">
                        <?php echo Mage::getBlockSingleton('directory/data')->getCountryHtmlSelect($this->getEstimateCountryId()) ?>
                    </div>
                </li>
                <?php // if($this->getStateActive()): ?>
                <li class="shipping-region">
                    <?php /* Removing the conditional check for whether the region is required, because it doesn't work
                    <label for="region_id"<?php if ($this->isStateProvinceRequired()) echo ' class="required"' ?>><?php if ($this->isStateProvinceRequired()) echo '<em>*</em>' ?><?php echo $this->__('State/Province') ?></label>
                    */ ?>
                    <label for="region_id" class="required"><em>*</em><?php echo $this->__('State/Province') ?></label>
                    <div class="input-box">
                        <select id="region_id" name="region_id" title="<?php echo $this->__('State/Province') ?>" style="display:none;"<?php echo ($this->isStateProvinceRequired() ? ' class="validate-select"' : '') ?>>
                            <option value=""><?php echo $this->__('Please select region, state or province') ?></option>
                        </select>
                        <script type="text/javascript">
                            //<![CDATA[
                            $('region_id').setAttribute('defaultValue',  "<?php echo $this->getEstimateRegionId() ?>");
                            //]]>
                        </script>
                        <input type="text" id="region" name="region" value="<?php echo $this->escapeHtml($this->getEstimateRegion()) ?>"  title="<?php echo $this->__('State/Province') ?>" class="input-text" style="display:none;" />
                    </div>
                </li>
                <?php // endif; ?>
                <?php if($this->getCityActive()): ?>
                    <li class="shipping-region">
                        <label for="city"<?php if ($this->isCityRequired()) echo ' class="required"' ?>><?php if ($this->isCityRequired()) echo '<em>*</em>' ?><?php echo $this->__('City') ?></label>
                        <div class="input-box">
                            <input class="input-text<?php if ($this->isCityRequired()):?> required-entry<?php endif;?>" id="city" type="text" name="estimate_city" value="<?php echo $this->escapeHtml($this->getEstimateCity()) ?>" />
                        </div>
                    </li>
                <?php endif; ?>
                <li class="shipping-postcode">
                    <?php /* Removing the conditional check for whether the postal code is required, because it doesn't work
                    <label for="postcode"<?php if ($this->isZipCodeRequired()) echo ' class="required"' ?>><?php if ($this->isZipCodeRequired()) echo '<em>*</em>' ?><?php echo $this->__('Zip/Postal Code') ?></label>
                    */ ?>
                    <label for="postcode" class="required"><em>*</em><?php echo $this->__('Zip') ?></label>
                    <div class="input-box">
                        <input class="input-text validate-postcode<?php if ($this->isZipCodeRequired()):?> required-entry<?php endif;?>" type="text" id="postcode" name="estimate_postcode" value="<?php echo $this->escapeHtml($this->getEstimatePostcode()) ?>" />
                    </div>
                </li>
            </ul>


            <input name="radio" type="radio" value="" checked="checked"  id="Per" onclick="GHT()" class="radio" />
            <label>Personal</label>
            <br>
            <input name="radio" type="radio" value="Business" id="Bus" onclick="ABCD()" class="radio" />
            <label>Business</label>
            <br>

        </form>

        <!--p id="demo"></p-->

        <form method='post' id="repeatForm" >



            <label for="SomeTextField" id="Show1"style="display:none;"> Business Number </label>
            <INPUT TYPE = "TEXT" NAME='Show2' VALUE ="" id="Show2" style="display:none;">

            <label for="SomeTextField" id="Show3"style="display:none;" > Business Name </label>
            <INPUT TYPE = "TEXT" NAME='NM' VALUE ="" id="Show4" style="display:none;" onclick="PLM()">


        </form>

        <!--INPUT TYPE = "Submit" method="post" id = "SBMT" VALUE ="BUSINESS TAX RATE" style="color:blue ; text-decoration: underline" class="button2" onclick="PLM()" -->



        <script type="text/javascript" >
            //<![CDATA[


            PLM = function () {

                //var foo =	document.getElementById('Show2').value  ;

                //document.getElementById("demo").innerHTML = foo;

                document.getElementById("repeatForm").submit();


                <?php


/*
                            $ASDFG = '<p id="demo"></p>';
                        $session111 = Mage::getSingleton("core/session");
                        $session111->setData("BN_variable", $ASDFG);
        */
                ?>

            }


            ABCD = function () {


                document.getElementById('Show1').style.display = "block";
                document.getElementById('Show2').style.display = "block";
                document.getElementById('Show3').style.display = "block";
                document.getElementById('Show4').style.display = "block";


            }

            GHT = function () {

                document.getElementById('Show1').style.display = "none";
                document.getElementById('Show2').style.display = "none";
                document.getElementById('Show3').style.display = "none";
                document.getElementById('Show4').style.display = "none";

            }


        </script>




        <div class="buttons-set">
            <button type="button" title="<?php echo $this->__('Estimate') ?>" onclick="coShippingMethodForm.submit()" class="button2">
                <span><span><?php echo $this->__('Get Tax Rate') ?></span></span>

            </button>
        </div>


        <script type="text/javascript" >
            //<![CDATA[

            CHKBSN = function () {

                document.getElementById("Bus").checked == true;

                <?php	echo "ghfghfhfhfhfhfgh" ; ?>
            }

        </script>


        <?php



        $ASDFG = $_POST["Show2"];
        if (empty($ASDFG)) {
            //echo "Heloooooo" ;
        }

        else {


//echo "<SCRIPT LANGUAGE="'text/javascript'">document.getElementById('Bus').checked == true;</SCRIPT>";

//echo "Nissssssssssssssstttttttttttt" ;

        }

        ?>

        <?php


        /*
        $ASDFG = '<p id="demo"></p>';
        echo $ASDFG;
        var_dump($ASDFG);

                    if ($ASDFG == '<p id="demo"></p>') {


                            $session111 = Mage::getSingleton("core/session");
                            $session111->setData("BN_variable", "0");
                    }
                            else
                            {
                                $session111 = Mage::getSingleton("core/session");
                            $session111->setData("BN_variable", "1010000001");

                            }
        */
        ?>


        <script type="text/javascript">
            //<![CDATA[
            new RegionUpdater('country', 'region', 'region_id', <?php echo $this->helper('directory')->getRegionJson() ?>);
            //]]>
        </script>

        <?php if (($_shippingRateGroups = $this->getEstimateRates())): ?>

            <form id="co-shipping-method-form" action="<?php echo $this->getUrl('checkout/cart/estimateUpdatePost') ?>">
                <dl class="sp-methods">
                    <?php foreach ($_shippingRateGroups as $code => $_rates): ?>
                        <dt><?php /* echo $this->escapeHtml($this->getCarrierName($code)) */ ?></dt>

                        <dt><?php echo "<font color=''>Tax value based on your location :</font>";?></dt>
                        <dd>
                            <ul>



                                <?php foreach ($_rates as $_rate): ?>
                                    <li<?php if ($_rate->getErrorMessage()) echo ' class="error-msg"';?>>
                                        <?php if ($_rate->getErrorMessage()): ?>
                                            <?php echo $this->escapeHtml($_rate->getErrorMessage()) ?>
                                        <?php else: ?>
                                    <!--input name="estimate_method" type="radio" value="<?php echo $this->escapeHtml($_rate->getCode()) ?>" id="s_method_<?php echo $_rate->getCode() ?>"<?php if($_rate->getCode()===$this->getAddressShippingMethod()) echo ' checked="checked"' ?> class="radio" /-->
                                   
								   <!--label for="s_method_<?php echo $_rate->getCode() ?>"--><!--?php echo $this->escapeHtml($_rate->getMethodTitle()) ?-->
									
									<!--?php $_excl = $this->getShippingPrice($_rate->getPrice(), $this->helper('tax')->displayShippingPriceIncludingTax());  ?-->	
									
									<?php /* $_excl = $this->getAtaxPrice(); */ ?>

                                            <?php $_incl = $this->getShippingPrice($_rate->getPrice(), true); ?>


                                            <?php echo $_excl; ?>
                                            <?php if ($this->helper('tax')->displayShippingBothPrices() && $_incl != $_excl): ?>
                                                (<?php echo $this->__('Incl. Tax'); ?> <?php echo $_incl; ?>)
                                            <?php endif; ?>
                                    </label>
                               <?php endif ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <ul>


                                <?php

                                $doc = new DOMDocument();
                                $doc->preserveWhiteSpace=false;
                                $doc->formatOutput = true;

                                $r = $doc->createElement( "tcRequest" );
                                $doc->appendChild( $r );

                                $CartSession = Mage::getSingleton('checkout/session');

                                $Ref = $doc->createElement( "clientRef" );
                                $Ref->appendChild( $doc->createTextNode( rand(1000000, 9000000) ) );
                                $r->appendChild( $Ref );

                                function microtime_float()
                                {
                                    list($usec, $sec) = explode(" ", microtime());
                                    return ((float)$usec) ;
                                    //+ (float)$sec);
                                }
                                $time_start = microtime_float();
                                //echo  substr($time_start,3,3) ;
                                date_default_timezone_set("America/Montreal");

                                $Ttime = $doc->createElement( "txnTime" );
                                $Ttime->appendChild( $doc->createTextNode( date('YmdHis', time()).substr($time_start,3,3)  ) );
                                $r->appendChild( $Ttime );

                                if (empty($ASDFG)) {

                                    $type = $doc->createElement( "type" );
                                    $type->appendChild( $doc->createTextNode( "1" ) );
                                    $r->appendChild( $type );
                                }
                                else {
                                    $type = $doc->createElement( "type" );
                                    $type->appendChild( $doc->createTextNode( "2" ) );
                                    $r->appendChild( $type );
                                }


                                $m = $doc->createElement( "merchant" );
                                $bn1 = $doc->createElement( "BN1" );
                                $bn1->appendChild( $doc->createTextNode( "8723458787" ) );
                                $m->appendChild( $bn1 );
                                $r->appendChild( $m );

                                $bn2 = $doc->createElement( "BN2" );
                                $bn2->appendChild( $doc->createTextNode( "87234587870" ) );

                                $m->appendChild( $bn2 );
                                $r->appendChild( $m );



                                $py = $doc->createElement( "payer" );
                                $country= $this->getEstimateCountryId();
                                if ($country == 'CA') {
                                    $Countcode = '1';
                                }
                                $cn = $doc->createElement( "country" );
                                $cn->appendChild( $doc->createTextNode( $Countcode ) );
                                $py->appendChild( $cn );

                                $prov =$this->getAddress()->getRegion();


                                if ($prov == 'Alberta') {
                                    $ProvCode = '101';
                                }
                                if ($prov == 'British Columbia') {
                                    $ProvCode = '102';
                                }
                                if ($prov == 'Manitoba') {
                                    $ProvCode = '103';
                                }
                                if ($prov == 'Newfoundland and Labrador') {
                                    $ProvCode = '104';
                                }
                                if ($prov == 'New Brunswick') {
                                    $ProvCode = '105';
                                }
                                if ($prov == 'Nova Scotia') {
                                    $ProvCode = '106';
                                }
                                if ($prov == 'Northwest Territories') {
                                    $ProvCode = '107';
                                }
                                if ($prov == 'Nunavut') {
                                    $ProvCode = '108';
                                }
                                if ($prov == 'Ontario') {
                                    $ProvCode = '109';
                                }
                                if ($prov == 'Prince Edward Island') {
                                    $ProvCode = '110';
                                }
                                if ($prov == 'Quebec') {
                                    $ProvCode = '111';
                                }
                                if ($prov == 'Saskatchewan') {
                                    $ProvCode = '112';
                                }
                                if ($prov == 'Yukon Territory') {
                                    $ProvCode = '113';
                                }
                                $pr = $doc->createElement( "province" );
                                $pr->appendChild( $doc->createTextNode( $ProvCode ) );
                                $py->appendChild( $pr );

                                $postcode= $this->getAddress()->getPostcode();
                                $pst = $doc->createElement( "postcode" );
                                $pst->appendChild( $doc->createTextNode( $postcode ) );
                                $py->appendChild( $pst );





                                //$session111 = Mage::getSingleton("core/session");
                                //$AAA = $session111->getData("BN_variable");
                                $sname =$ASDFG ;
                                //var_dump($AAA);






                                if ($sname == '') {
                                    $sname = '0';
                                }
                                $BBNN1 = $doc->createElement( "BN1" );
                                $BBNN1->appendChild( $doc->createTextNode( $sname ) );
                                $py->appendChild( $BBNN1 );

                                if ($sname == '0') {
                                    $sname = '';
                                }
                                $BBNN2 = $doc->createElement( "BN2" );
                                $BBNN2->appendChild( $doc->createTextNode( $sname."0" ) );
                                $py->appendChild( $BBNN2 );

                                $r->appendChild( $py );



                                foreach($CartSession->getQuote()->getAllItems() as $item)
                                {

                                    $Price  = $item->getPrice();
                                    $qty = $item->getQty();
                                    $name = $item->getName();

                                    if ($name == 'Massage Therapy') {
                                        $code = '11-06';
                                    }
                                    if ($name == 'Walk in. Drive out') {
                                        $code = '07-28';
                                    }
                                    if ($name == 'Music Lessons') {
                                        $code = '12-03';
                                    }
                                    if ($name == 'Hydrofloss Dental ') {
                                        $code = '10-12';
                                    }

                                    if ($name == 'Kids Roller Skating Protective') {
                                        $code = '12-03';
                                    }
                                    if ($name == 'Adidas Soccer Ball') {
                                        $code = '12-00';
                                    }
                                    if ($name == 'Trigger Point Therapy') {
                                        $code = '11-06';
                                    }
                                    if ($name == 'Teeth Whitening') {
                                        $code = '11-00';
                                    }
                                    if ($name == 'Scooter Electrique') {
                                        $code = '07-00';
                                    }
                                    if ($name == '2 Pack Assorted Toothbrushes') {
                                        $code = '10-13';
                                    }
                                    if ($name == 'Public Transit Planning and Operation') {
                                        $code = '06-03';
                                    }
                                    if ($name == 'Better Public Transit Systems') {
                                        $code = '01-02';
                                    }

                                    // echo $name;
                                    // echo $Price;
                                    // echo $qty;



                                    $b = $doc->createElement( "cat" );

                                    $ap = $doc->createElement( "amount" );
                                    $ap->appendChild( $doc->createTextNode( $Price*$qty)  );
                                    $b->appendChild( $ap );

                                    $gt = $doc->createElement( "code" );
                                    $gt->appendChild( $doc->createTextNode( $code) );
                                    $b->appendChild( $gt );

                                    $r->appendChild( $b );

                                }

                                $doc->save("c:\write.xml")	;


                                ?>


                                <?php


                                $doc="c:\write.xml" ;


                                $t_xml = new DOMDocument();
                                $t_xml->load($doc);
                                $xml_out = $t_xml->saveXML($t_xml->documentElement);



                                $rl = "http://10.10.160.31/ODWS/ODWS.asmx?wsdl" ;
                                $options["connection_timeout"] = 25;
                                $options["location"] = $url;
                                $options['trace'] = 1;
                                $options['style'] = SOAP_RPC;
                                $options['use'] = SOAP_ENCODED;
                                $options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;

                                try
                                {
                                    $client = new SoapClient($rl, $options);

                                    $param = array("tcRequest"=>$xml_out);

                                    $res = 	$client->TI($param);

                                    $xml = simplexml_load_string($res);



                                }

                                catch ( SoapFault $exception )
                                {
                                    echo $exception->getMessage();
                                }



                                $akkk = $res->TIResult;
                                $xml = new SimpleXMLElement($akkk);
                                file_put_contents("c:\AlXml.xml", $akkk);

                                //var_dump($akkk);



                                //-------------------------------Transaction Data ---------------------
                                $file = 'C:\wamp\www\people.txt';
                                // Open the file to get existing content
                                $current = file_get_contents($file);
                                // Append a new person to the file
                                $current = "Send : ".$akkk ;
                                // Write the contents back to the file
                                file_put_contents($file, $current);



                                echo "<B>".$xml->tax[0]->name."</b>";
                                echo " = $";
                                echo $xml->tax[0]->amount;
                                echo "<br>";
                                echo "<B>".$xml->tax[1]->name."</b>";
                                echo " = $";
                                echo $xml->tax[1]->amount;
                                echo "<br>";
                                //echo"<B>Tax exemption  </b>";
                                //echo "<br>";

                                foreach ($xml->exempted[0]->cat as $rating) {

                                    /*
                                            echo "<label for='SoTeFi' id='Show33' style='display:none;'>".$rating['name'].
                                               " : rate=" .$rating['rate']. " amount= $".$rating['amount']."</label>" ;

                                            echo $rating['name'];
                                            echo "  ";
                                            echo " rate= ";
                                            echo $rating['rate'];
                                            echo " amount= $";
                                            echo $rating['amount'];
                                            echo "<br>";
                                    */
                                }

                                //var_dump($res);

                                ?>
                                <div class="buttons-set">
                                    <button type="button" title="gggggg" onclick="GGTTFF()" class="button2" style="float: left;">
                                        <span><span><?php echo $this->__('Tax exemptions and details') ?></span></span>

                                    </button>
                                </div>



                                <script type="text/javascript">
                                    //<![CDATA[

                                    GGTTFF = function () {

                                        //document.getElementById('Show33').style.display = "block";

                                        alert( '<?php
					
								echo "Taxable Amount : ";
								echo "\\n";
								echo "\\n";			

								$NamePieces = explode("+", $xml->summary[0]->taxable['name']);
								$AmountPieces = explode("+", $xml->summary[0]->taxable['amount']);
								
									echo $NamePieces[0]; 
									echo " = ";
									echo $AmountPieces[0]; 
									echo "\\n";	
									echo $NamePieces[1]; 
									echo " = ";
									echo $AmountPieces[1]; 

							//	echo $xml->summary[0]->taxable['name'];	
							//	echo " = ";
							//	echo $xml->summary[0]->taxable['amount'];
								echo "\\n";	
								echo "\\n";
								
								echo "Non Taxable Amount : ";
								echo "\\n";	
								echo "\\n";
								
								
								$NonName = explode("+", $xml->summary[0]->nontaxable['name']);
								$NonAmount = explode("+", $xml->summary[0]->nontaxable['amount']);
								
									echo $NonName[0]; 
									echo " = ";
									echo $NonAmount[0]; 
									echo "\\n";	
									echo $NonName[1]; 
									echo " = ";
									echo $NonAmount[1]; 

							//	echo $xml->summary[0]->nontaxable['name'];	
							//	echo " = ";
							//	echo $xml->summary[0]->nontaxable['amount'];
								echo "\\n";	
								echo "\\n";
								
								echo"Tax exemption  : ";
								echo "\\n";
								echo "\\n";
					foreach ($xml->exempted[0]->cat as $rating) {
								

														
								
								
								echo $rating['name'];
								echo "  ";
								echo " rate= ";
								echo $rating['rate'];
								echo " amount= $";
								echo $rating['amount'];
								echo "\\n";	
   
							}
							 
					?>' );

                                    }
                                </script>

                            </ul>

                        </dd>
                    <?php endforeach; ?>



                    <?php

                    $session = Mage::getSingleton("core/session");
                    $A=$xml->tax[0]->amount ;
                    $B= $xml->tax[1]->amount ;
                    $ddd = (floatval($xml->tax[0]->amount) + floatval($xml->tax[1]->amount)) /2 ;
                    $session->setData("your_variable", $ddd);


                    //		$session = Mage::getSingleton("core/session");
                    //		$session->setData("ALLII", $xml);
                    //$page = "http://www.abc.com/index.php/checkout/cart.html";
                    //header("refresh:0;");

                    ?>

                </dl>
                <!--div class="buttons-set">
                <button type="submit" title="<?php echo $this->__('Update Total') ?>" class="button" name="do" value="<?php echo $this->__('Update Total') ?>">
                    <span><span><?php echo $this->__('Update Total') ?></span></span>
                </button>
            </div-->
                <br>
                <?php echo "<font color='blue'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Powered by Allagma Technologies.</font>";?>

            </form>
        <?php endif; ?>


        <script type="text/javascript">
            //<![CDATA[
            var coShippingMethodForm = new VarienForm('shipping-zip-form');
            var countriesWithOptionalZip = <?php echo $this->helper('directory')->getCountriesWithOptionalZip(true) ?>;

            coShippingMethodForm.submit = function () {


                var country = $F('country');
                var optionalZip = false;

                for (i=0; i < countriesWithOptionalZip.length; i++) {
                    if (countriesWithOptionalZip[i] == country) {
                        optionalZip = true;
                    }
                }
                if (optionalZip) {
                    $('postcode').removeClassName('required-entry');
                }
                else {
                    $('postcode').addClassName('required-entry');
                }




                return VarienForm.prototype.submit.bind(coShippingMethodForm)();

            }


            //]]>
        </script>

    </div>
</div>

