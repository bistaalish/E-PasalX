<!-- resources/views/components/user-card.blade.php -->
<div class="user-card">
    <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture" class="profile-picture">
    <div class="user-info">
        <p class="user-name">{{ $user->name }}</p>
        <p class="user-role">{{ $user->email }}</p>
    </div>
</div>
