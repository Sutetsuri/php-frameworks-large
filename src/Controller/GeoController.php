<?php
// src/Controller/GeoController.php
// Code for Google geocoding -> "https://www.codeofaninja.com/2014/06/google-maps-geocoding-example-php.html"
// also some other link for lati and longi handling, but I lost it. There's a good chance Joel(/joelmu) has it though.
// big thanks to Joe(/JoeNg93) to explainig stuf to us too.

namespace App\Controller;

use App\Entity\Address;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GeoController extends Controller
{
  /**
   * @Route("/", name="index")
   */
  public function initPage(Request $request)
  {


return new Response($this->renderView('default/new.html.twig', array()));
  }


  /**
   * @Route("/geo", name="geo")
   */

  public function geoCode(){
    if (isset($_GET['submitForm'])){

      $address = urlencode($_GET["address"]);

      $url = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyCWIl8pkTbpwT1_fZeftQNG4-Pe06RKbkc");
      $resp = json_decode($url, true);

      if ($resp['status']=='OK'){
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";

        $latitude = (string)$lati;
        $longitude = (string)$longi;

        if($latitude && $longitude){

          return new Response(
            $this->renderView('default/new.html.twig', array(
              'latitude' => $latitude,
              'longitude' => $longitude,
            ))
          );
        }
        else{
          return new Response($resp['status']);
        }
      }

        else{
          echo "<strong>ERROR: {$resp['status']}</strong>";
         return false;
        }
    }else{
      echo "<strong>ERROR: {$resp['status']}</strong>";
         return false;
    }
  }

  }
