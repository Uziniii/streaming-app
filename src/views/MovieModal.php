
<dialog id="modal">
        <button onclick="closeModal('modal')" autofocus class="modalExit">
            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

            <g id="SVGRepo_bgCarrier" stroke-width="0"/>

            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

            <g id="SVGRepo_iconCarrier"> <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </g>

            </svg>
        </button>
        <div class="modalBanner">
            <div class="modalBannerTopContainer">
                <p class="modalBannerDesc">movie description</p>
                <h2 class="modalBannerTitle">Movie title</h2>
            </div>
            <div class="modalBannerGenreBtn">
                <div class="modalGenreContainer">
                    <!-- GENRE IINJECTED BY THE JAVASCRIPT SCRIPT -->
                </div>
                <div class="modalBannerBtn">
                    <button class='modalLikeBtn'>
                        <div>
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">
                            <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                                <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                                <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>
                                <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>

                                <g id="grp7" opacity="0" transform="translate(7 6)">
                                    <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
                                    <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
                                </g>

                                <g id="grp6" opacity="0" transform="translate(0 28)">
                                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
                                    <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
                                </g>

                                <g id="grp3" opacity="0" transform="translate(52 28)">
                                    <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
                                    <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
                                </g>

                                <g id="grp2" opacity="0" transform="translate(44 6)">
                                    <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
                                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
                                </g>

                                <g id="grp5" opacity="0" transform="translate(14 50)">
                                    <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
                                    <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
                                </g>

                                <g id="grp4" opacity="0" transform="translate(35 50)">
                                    <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
                                    <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
                                </g>

                                <g id="grp1" opacity="0" transform="translate(24)">
                                    <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
                                    <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
                                </g>
                                </g>
                            </svg>
                            </label>
                        </div>
                    </button>
                </div>
            </div>
            
            <div class="modalCardContainer">
                <a id="magnet"><svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                <div class=" modalCard">
                    <p class="modalCardTitle">rating</p>
                    <p class="modalRating modalCardContent"></p>
                </div>
                <div class=" modalCard">
                    <p class="modalCardTitle">release</p>
                    <p class="modalReleaseDate modalCardContent"></p>
                </div>
                <div class=" modalCard">
                    <p class="modalCardTitle">budget</p>
                    <p class="modalBudget modalCardContent"></p>
                </div>
                <div class=" modalCard">
                    <p class="modalCardTitle">length</p>
                    <p class="modalLength modalCardContent"></p>
                </div>
            </div>
        </div>
        <div class="modalDescriptionCastHypeContainer">
            <div class="modalDescriptionCastHype">
                <div class="modalDescriptionCast">
                    <section class="modalDescriptionContainer">
                        <h3 class="modalSectionTitle">Description</h3>
                        <p class="modalDescription">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate aliquid aliquam odio velit consequatur? Ducimus qui quia atque, optio dolore architecto? Officiis, necessitatibus aliquam! Asperiores ullam facere doloribus ipsum provident necessitatibus porro repudiandae dignissimos consequuntur dicta ducimus qui dolores vero officia quae deleniti minus, eum expedita excepturi numquam corporis voluptas.</p>
                    </section>
                    <section class="modalCastContainer">
                        <h3 class="modalSectionTitle">Notable Cast</h3>
                        <div class="modalCastArticleContainer">
                            <!-- Injected cast using JS -->
                        </div>
                    </section>
                </div>
                <section class="modalHypeContainer">
                <h3 class="modalSectionTitle">Hype</h3>
                <p class="modalHype"></p>
                </section>
            </div>
        </div>
    </dialog>