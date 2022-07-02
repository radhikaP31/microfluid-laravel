<x-app-layout>
    <x-slot name="title" metaname="{{ __('tagstitle') }}" meta-content="{{ __('content') }}">
            {{ __('Home | Microfluid Process Equipment') }}
    </x-slot>
<main id="main">
<div>
  <img src="Assets/images/Header1.jpg" id="headImage">
</div>
<nav id="navBar">
  <ul>
    <li><a href="index.html" class="active">Home</a></li>
    <li><a href="weapons.html">Weapons</a></li>
    <li><a hred="maps.html">Maps</a></li>
    <li><a href="modes.html">Modes</a></li>
    <li><a href="contact.html">Contact</a></li>
  </ul>
</nav>
</main><!-- End #main -->


</x-app-layout>

<style type="text/css">
  
  body {
  background-color: rgb(43, 23, 23);
  padding: 0;
  margin: 0;
  height: 1000px;
}

.active {
  background-color: rgb(31, 31, 31);
}

#headImage {
  width: 100%;
  height: 150px;
  object-fit: cover;
  object-position: 50% 50%;
}

#navBar {
  position: sticky;
  top: 0;
}

#navBar ul {
  list-style-type: none;
  overflow: hidden;
  background-color: rgb(20, 20, 20);
  padding: 0;
  margin: 0;
}

#navBar li {
  display: inline-block;
}

#navBar a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

#navBar a:hover {
  background-color: rgb(31, 31, 31);
}

</style>