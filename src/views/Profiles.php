<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/profiles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<main class="container">
  <h1>Qui est-ce ?</h1>
  <section class="wrapper">
    <?php foreach ($profiles as $profile) : ?>
      <article>
      <a class="profile-container" href="/profiles/select/<?= $profile->getProfileId() ?>">


          <!-- Utilisez un lien avec /profiles/select/{profile_id} au lieu de /profiles/{profile_id} -->
          <div class="profile">
            <img width="75px" src="/img/default_avatar.png" alt="close">
          </div>
          <p><?= $profile->getProfileName() ?></p>
          <?php var_dump($profile->getProfileId()); ?>
        </a>
      </article>
    <?php endforeach ?>
    <article>
      <a class="profile-container" href="/profiles/add">
        <div class="profile plus">
          <img width="75px" src="/img/plus.png" alt="close">
        </div>
        <p>Ajouter un profil</p>
      </a>
    </article>
  </section>
  <a class="edit-profiles">
    Gérer les profils
  </a>
</main>
