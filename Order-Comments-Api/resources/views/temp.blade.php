@extends('layout')

@section('title', 'Comments')

@section('content')

<h2>Collapsibles</h2>

<p>A Collapsible:</p>
<button type="button" class="collapsible">Open Collapsible</button>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
</div>

<p>Collapsible Set:</p>
<button type="button" class="collapsible">Open Section 1</button>
<div class="content">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
</div>
<button type="button" class="collapsible">Open Section 2</button>
<div class="content">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
</div>
<button type="button" class="collapsible">Open Section 3</button>
<div class="content">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </p>
</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
  </script>

@endsection

