@extends('layouts.app')
@section('content')

<style>
    #logo {
  display: flex;
  align-items: center;

  margin: 3px;
  font-size: 8px;
}

#logo:hover {
  cursor: pointer;
}

.svg {
  width: 30px;
  margin-right: 5px;
}

#headerList {
  list-style-type: none;
  height: 100%;
  display: flex;
  align-items: center;
}

.section {
  margin-top: 15px;
  margin-bottom: 15px;
}

.title {
  margin-bottom: 15px;
  text-align: center;
  font-size: 40px;
  color: #f0f0f0;
  outline-color: #000000;
  text-shadow: 2px 2px #616161;
}

.background {
  width: 100%;
  min-height: 80vh;
  padding: 0;
  border-radius: 20px;
  box-shadow: 5px 1px 20px #616161;
  background-color: #f0f0f0;
  background-size: cover;
  background-image: url("https://images.unsplash.com/photo-1560184897-502a475f7a0d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
}

.cover {
  width: 100%;
  min-height: 80vh;
  border-radius: 20px;
  background-color: #000000;
  opacity: 60%;
}

.information {
  position: absolute;
  bottom: 100px;
  z-index: 10;
  margin-left: 10px;

  font-size: 30px;
  color: white;
}

.status {
  max-width: 170px;
  min-width: 100px;
  margin-top: 10px;
  border-radius: 50px;
  background-color: rgb(167, 125, 132);
  text-align: center;
  font-size: 20px;
  padding-block: 10px;
}

.notebook {
  width: 80vw;
  height: 5%;
  margin: 40px;
  padding-top: 100px;
  background-color: aliceblue;
}

video {
  width: 300px;
  border-radius: 20px;
}

.roomInfo {
  padding-inline: 10px;
  display: flex;
  align-items: center;
  justify-content: space-between;

  opacity: 70%;
  font-size: 12px;
}

.services {
  padding: 10px;
  font-size: 12px;
  text-align: justify;
  opacity: 80%;
}

.servicesHead {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.servicesHead2 {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.servicesTitle {
  font-size: 16px;
}
</style>
<div class="container">
      <div class="section" id="news">
        <h1 class="title">NEWS</h1>
        <div style="display: flex; gap: 10px">
          <div class="background">
            <div class="information">
              <p><b>Type:</b> 1 Bed, 1 Washroom</p>
              <p><b>Hosted By:</b> RoomGO</p>
              <h3 class="status">LATEST</h3>
            </div>
            <div class="cover"></div>
          </div>
          <div
            class="background"
            style="
              background-image: url(https://images.unsplash.com/photo-1549638441-b787d2e11f14?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
            "
          >
            <div class="information">
              <p><b>Type:</b> 1 Bed, 1 Washroom</p>
              <p><b>Hosted By:</b> RoomGO</p>
              <h3 class="status">LATEST</h3>
            </div>
            <div class="cover"></div>
          </div>
          <div
            class="background"
            style="
              background-image: url(https://plus.unsplash.com/premium_photo-1661964402307-02267d1423f5?q=80&w=1973&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
            "
          >
            <div class="information">
              <p><b>Type:</b> 2 Beds, 2 Washrooms</p>
              <p><b>Hosted By:</b> RoomGO</p>
              <h3 class="status">COMING SOON</h3>
            </div>
            <div class="cover"></div>
          </div>
        </div>
      </div>

      <div class="section" id="about">
        <h1 class="title">ABOUT</h1>
        <div
          class="background"
          style="
            background-image: url('https://images.unsplash.com/photo-1669181232233-14281fc31470?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
          "
        >
          <div class="cover" style="display: flex; align-items: center">
            <video
              src="about.mp4"
              style="width: 100%; height: 100%"
              autoplay
              controls
            ></video>
          </div>
        </div>
      </div>

      <div class="section" id="rooms">
  <h1 class="title">ROOMS</h1>
  <div
    class="background d-flex flex-wrap gap-2 justify-content-center align-items-center"
    style="
      background-image: url(https://images.unsplash.com/photo-1518012312832-96aea3c91144?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
    "
  >
    <div class="card rounded-4">
      <video class="rounded-4" src="{{ asset('video1.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>1 Bed, 1 Washroom</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 4,999</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>

    <div class="card rounded-4">
      <video class="rounded-4" src="{{ asset('video2.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>1 Bed, 1 Washroom</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 3,499</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>

    <div class="card rounded-4">
      <video class="rounded-4" src="{{ asset('video3.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>1 Bed, 1 Washroom</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 3,999</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>

    <div class="card rounded-4">
      <video class="rounded-4" src="{{ asset('video4.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>2 Beds, 1 Washroom</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 8,999</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>

    <div class="card rounded-4">
      <video class="rounded-4" src="{{ asset('video5.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>3 Bed, 2 Washrooms</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 22,999</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>

    <div class="card rounded-4" >
      <video class="rounded-4" src="{{ asset('video6.mp4') }}" autoplay muted loop></video>
      <div class="roomInfo">
        <div>
          <p><b>Type: </b>3 Beds, 1 Washroom</p>
          <p><b>Hosted By: </b>RoomGO</p>
          <p style="font-size: 20px"><b>PKR 18,999</b></p>
        </div>
        <div class="status" style="font-weight: 600; color: #fefefe">
          BOOK
        </div>
      </div>
    </div>
  </div>
</div>


      <div class="section" id="services">
        <h1 class="title">SERVICES</h1>
        <div
          class="background gap-3"
          style="
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            background-image: url(https://plus.unsplash.com/premium_photo-1683580362892-fc31c2ff935b?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
          "
        >
          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"
                  />
                </svg>

                <p class="servicesTitle"><b>Availability</b></p>
              </div>
              <p>24/7 front desk and concierge for bookings and local tips.</p>
              <p>Express check-in/check-out available.</p>
            </div>
          </div>

          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"
                  />
                </svg>

                <p class="servicesTitle"><b>Comfort</b></p>
              </div>
              <p>Premium bedding and daily housekeeping.</p>
              <p>24/7 room service and climate control.</p>
            </div>
          </div>

          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 640 512"
                >
                  <path
                    d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"
                  />
                </svg>

                <p class="servicesTitle"><b>Technology</b></p>
              </div>
              <p>Free high-speed Wi-Fi and flat-screen TVs.</p>
              <p>Charging stations for devices.</p>
            </div>
          </div>

          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 448 512"
                >
                  <path
                    d="M416 0C400 0 288 32 288 176l0 112c0 35.3 28.7 64 64 64l32 0 0 128c0 17.7 14.3 32 32 32s32-14.3 32-32l0-128 0-112 0-208c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7L80 480c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224.4c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16l0 134.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8L64 16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"
                  />
                </svg>

                <p class="servicesTitle"><b>Food</b></p>
              </div>
              <p>On-site dining and bar/lounge.</p>
              <p>Complimentary breakfast included.</p>
            </div>
          </div>

          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 640 512"
                >
                  <path
                    d="M320 0c17.7 0 32 14.3 32 32l0 208c0 8.8 7.2 16 16 16s16-7.2 16-16l0-176c0-17.7 14.3-32 32-32s32 14.3 32 32l0 176c0 8.8 7.2 16 16 16s16-7.2 16-16l0-112c0-17.7 14.3-32 32-32s32 14.3 32 32l0 195.1c-11.9 4.8-21.3 14.9-25 27.8l-8.9 31.2L478.9 391C460.6 396.3 448 413 448 432c0 18.9 12.5 35.6 30.6 40.9C448.4 497.4 409.9 512 368 512l-19.2 0c-59.6 0-116.9-22.9-160-64L76.4 341c-16-15.2-16.6-40.6-1.4-56.6s40.6-16.6 56.6-1.4l60.5 57.6c0-1.5-.1-3.1-.1-4.6l0-272c0-17.7 14.3-32 32-32s32 14.3 32 32l0 176c0 8.8 7.2 16 16 16s16-7.2 16-16l0-208c0-17.7 14.3-32 32-32zm-7.3 326.6c-1.1-3.9-4.7-6.6-8.7-6.6s-7.6 2.7-8.7 6.6L288 352l-25.4 7.3c-3.9 1.1-6.6 4.7-6.6 8.7s2.7 7.6 6.6 8.7L288 384l7.3 25.4c1.1 3.9 4.7 6.6 8.7 6.6s7.6-2.7 8.7-6.6L320 384l25.4-7.3c3.9-1.1 6.6-4.7 6.6-8.7s-2.7-7.6-6.6-8.7L320 352l-7.3-25.4zM104 120l48.3 13.8c4.6 1.3 7.7 5.5 7.7 10.2s-3.1 8.9-7.7 10.2L104 168 90.2 216.3c-1.3 4.6-5.5 7.7-10.2 7.7s-8.9-3.1-10.2-7.7L56 168 7.7 154.2C3.1 152.9 0 148.7 0 144s3.1-8.9 7.7-10.2L56 120 69.8 71.7C71.1 67.1 75.3 64 80 64s8.9 3.1 10.2 7.7L104 120zM584 408l48.3 13.8c4.6 1.3 7.7 5.5 7.7 10.2s-3.1 8.9-7.7 10.2L584 456l-13.8 48.3c-1.3 4.6-5.5 7.7-10.2 7.7s-8.9-3.1-10.2-7.7L536 456l-48.3-13.8c-4.6-1.3-7.7-5.5-7.7-10.2s3.1-8.9 7.7-10.2L536 408l13.8-48.3c1.3-4.6 5.5-7.7 10.2-7.7s8.9 3.1 10.2 7.7L584 408z"
                  />
                </svg>

                <p class="servicesTitle"><b>Facilities</b></p>
              </div>
              <p>Fitness center, swimming pool, and spa.</p>
              <p>Business center and meeting spaces.</p>
            </div>
          </div>

          <div class="card rounded-4" style="width: 200px; height: 150px">
            <div class="services">
              <div class="servicesHead">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  style="max-width: 40px; min-width: 40px"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0z"
                  />
                </svg>

                <p class="servicesTitle"><b>Safety</b></p>
              </div>
              <p>24/7 security and in-room safes.</p>
              <p>Clear emergency protocols in place.</p>
            </div>
          </div>
        </div>
      </div>

    <div class="section" id="contact">
        <h1 class="title text-center ">CONTACT</h1>
        <div
    class="background d-flex flex-wrap justify-content-center align-items-center p-5"
    style="background-image: url('https://images.pexels.com/photos/6915114/pexels-photo-6915114.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');"
  >
    <div class="row w-100">
      <div class="col-md-4 mb-4">
        <div class="card text-center text-white bg-secondary p-4 rounded-4 shadow-lg">
          <div class="card-body d-flex gap-4 align-items-center justify-content-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              style="max-width: 60px; min-width: 60px; fill: white"
              viewBox="0 0 512 512"
            >
              <path
                d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256l0 32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32l0 80 0 32c0 17.7 14.3 32 32 32s32-14.3 32-32l0-32c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"
              />
            </svg>
            <p class="servicesTitle mt-3" style="font-size: 1.5rem; font-weight: bold;">
              MUSTAFA357YT@GMAIL.COM
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card text-center text-white rounded-4" style="background-color: rgb(1, 1, 102); padding: 30px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
          <div class="card-body d-flex align-items-center gap-4 justify-content-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 496 512"
              style="max-width: 60px; min-width: 60px; fill: white"
            >
              <path
                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
              />
            </svg>
            <p class="servicesTitle mt-3" style="font-size: 1.5rem; font-weight: bold;">
              MUSTAFAC0DES
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card text-center text-white bg-success p-4 shadow-lg">
          <div class="card-body d-flex align-items-center justify-content-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512"
              style="max-width: 60px; min-width: 60px; fill: white"
            >
              <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
              />
            </svg>
            <p class="servicesTitle mt-3" style="font-size: 1.5rem; font-weight: bold;">
              +92 324 6500736
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
    </div>
@endsection
    
    
