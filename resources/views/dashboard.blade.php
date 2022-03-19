@extends('layouts.master')
@include('layouts.inc.nav')

@section('content')
  <section class="container mt-4">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6">
                <form class="form-container">
                    <h2 class="text-center bg-dark p-2 text-white">Add Task Listing</h2>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark btn-block save_btn">Submit</button>
                </form>
            </div>
        </div>
      </div>
  </section>
@endsection



