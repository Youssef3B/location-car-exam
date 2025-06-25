@extends('layouts.admin')

@section('content')

 <div class="main-content">
    <!-- View Messages Section -->
      <div class="dashboard-section" id="messages">
        <h2 class="section-title">💬 View Messages</h2>

        <div class="message-list">
          <div class="message-item unread">
            <img
              src="https://randomuser.me/api/portraits/men/45.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender">Robert Smith</span>
                <span class="message-time">2 hours ago</span>
              </div>
              <div class="message-subject">
                Question about my rental request
              </div>
              <p class="message-preview">
                Hi, I submitted a rental request for the Ford Mustang but
                haven't heard back yet. Can you let me know the status?
              </p>
            </div>
          </div>

          <div class="message-item">
            <img
              src="https://randomuser.me/api/portraits/women/33.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender">Emily Davis</span>
                <span class="message-time">1 day ago</span>
              </div>
              <div class="message-subject">Issue with car condition</div>
              <p class="message-preview">
                The Porsche I rented had some scratches that weren't mentioned
                in the listing. What should I do?
              </p>
            </div>
          </div>

          <div class="message-item">
            <img
              src="https://randomuser.me/api/portraits/men/28.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender">David Wilson</span>
                <span class="message-time">3 days ago</span>
              </div>
              <div class="message-subject">
                Feedback about my rental experience
              </div>
              <p class="message-preview">
                I wanted to share that my Tesla rental was excellent! The owner
                was very professional and the car was perfect.
              </p>
            </div>
          </div>

          <div class="message-item">
            <img
              src="https://randomuser.me/api/portraits/women/51.jpg"
              class="message-avatar"
            />
            <div class="message-content">
              <div class="message-header">
                <span class="message-sender">Lisa Brown</span>
                <span class="message-time">5 days ago</span>
              </div>
              <div class="message-subject">Question about insurance</div>
              <p class="message-preview">
                Could you clarify what the insurance covers for the Jeep
                Wrangler I'm interested in renting?
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection
