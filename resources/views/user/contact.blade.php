<section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="{{url('send_feedback')}}" method="POST">
            @csrf
            <div>
              <input type="text" placeholder="Name" name="name" />
            </div>
            <div>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div>
              <input type="text" placeholder="Phone" name="phone"/>
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" name="message" />
            </div>
            <div class="d-flex " align="center">
              <input type="submit" value="SEND" style="width:100px;  background-color:#ea3c53; margin-left:170px;color:white;border:none;">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
