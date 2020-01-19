<!-- Create section that will showcase an image and catch the eye of users -->
<section id="showcase">
    <div class="container">
        <h1>The best campsites across Canada.</h1>
        <p>Want to get away for the weekend? Look no further. CampFire has all the hottest camping spots rated by nature lovers
            just like you. You're welcome!</p>
    </div>
</section>

<!-- Create search options using forms -->
<section id="searchbars">
    <div class="container">
        <div class="searchform">
            <h1>Find a campsite</h1>
            <!-- Create search bar with text field -->
            <form action="/results" method="get">
                <input type="text" name="q" placeholder="Search by name">
                <button type="submit" class="button_1">Go</button>
            </form>
            <!-- Create dropdown search -->
            <form action="/results">
                <h1>Or search by rating</h1>
                <select id="myList">
                    <option value="1">&#128293;</option>
                    <option value="2">&#128293;&#128293;</option>
                    <option value="3">&#128293;&#128293;&#128293;</option>
                    <option value="4">&#128293;&#128293;&#128293;&#128293;</option>
                    <option value="5">&#128293;&#128293;&#128293;&#128293;&#128293;</option>
                </select>
                <button type="submit" class="button_2">Go</button>
            </form>
        </div>
    </div>
</section>
<!-- Create section for the 3 pictures and informative text for each picture -->
<section id="boxes">
    <div class="container">
        <div class="box">
            <img src="./img/account.png" alt="User Icon">
            <h3>Create an account</h3>
            <p>Sign up for an account to access social features</p>
        </div>
        <div class="box">
            <img src="./img/map.png" alt="Map Icon">
            <h3>Browse the best camping sites</h3>
            <p>Plan your next getaway location and find friends to tag along</p>
        </div>
        <div class="box">
            <img src="./img/mic.png" alt="Microphone Icon">
            <h3>Let your voice be heard</h3>
            <p>Leave reviews for sites you visit and share with the world</p>
        </div>
    </div>
</section>