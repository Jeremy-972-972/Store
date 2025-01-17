@extends('layouts.store')

@section('content')

<div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
    <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pb-8 pt-14 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
      <div class="grid w-full grid-cols-1 items-start gap-x-6 gap-y-8 sm:grid-cols-12 lg:gap-x-8">
        <div class="aspect-h-3 aspect-w-2 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
          <img src="https://psblog.fr/wp-content/uploads/2020/07/marvels-spider-man-ps5-jaquette-789x1024.jpg" alt="Two each of gray, white, and black shirts arranged on table." class="object-cover object-center">
        </div>
        <div class="sm:col-span-8 lg:col-span-7">
          <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{$product->name}}</h2>

          <section aria-labelledby="information-heading" class="mt-2">
            <h3 id="information-heading" class="sr-only">Review</h3>

            <p class="text-2xl text-gray-900">{{$product->price}}</p>

            <!-- Reviews -->
            <div class="mt-6">
              <h4 class="sr-only">Reviews</h4>
              <div class="flex items-center">
                <div class="flex items-center">
                  <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <p
                </div>
                <p class="sr-only">3.9 out of 5 stars</p>
                <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
              </div>
            </div>
          </section>

          <section aria-labelledby="options-heading" class="mt-10">
            <h3 id="options-heading" class="sr-only">Product options</h3>

            <form>
              <!-- Colors -->
              <fieldset aria-label="Choose a color">
                <legend class="text-sm font-medium text-gray-900">Color</legend>

                <div class="mt-4 flex items-center space-x-3">
                  <!-- Active and Checked: "ring ring-offset-1" -->
                  {{$product->description}}
                  <!-- Active and Checked: "ring ring-offset-1" -->
                 
                  <!-- Active and Checked: "ring ring-offset-1" -->

                </div>
              </fieldset>

              <!-- Sizes -->
              <fieldset class="mt-10" aria-label="Choose a size">
                <div class="flex items-center justify-between">
                  <div class="text-sm font-medium text-gray-900">Size</div>
                  <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
                </div>

                <div class="mt-4 grid grid-cols-4 gap-4">
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="XXS" class="sr-only">
                    <span>XXS</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="XS" class="sr-only">
                    <span>XS</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="S" class="sr-only">
                    <span>S</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="M" class="sr-only">
                    <span>M</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="L" class="sr-only">
                    <span>L</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="XL" class="sr-only">
                    <span>XL</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-pointer items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="XXL" class="sr-only">
                    <span>XXL</span>
                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex cursor-not-allowed items-center justify-center rounded-md border bg-gray-50 px-4 py-3 text-sm font-medium uppercase text-gray-200 hover:bg-gray-50 focus:outline-none sm:flex-1">
                    <input type="radio" name="size-choice" value="XXXL" disabled class="sr-only">
                    <span>XXXL</span>
                    <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                      <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                      </svg>
                    </span>
                  </label>
                </div>
              </fieldset>

              <a href={{route('panier.ajouter' , $product)}} class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</a>
              <a href={{route('favoris.edit' , $product)}} class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Favoris</a>
            </form>
          </section>
        </div>
      </div>
    </div>
  </div>
  

  <x-product-card :products="$products" />
  

{{-- <div class="container">
    <div class="box">1</div>
    <div class="box">2</div>
    <div class="box">3</div>

</div> --}}

@endsection