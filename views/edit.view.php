<?php require "views/partials/heading.php"; ?>

      <div class="flex justify-center items-center ">
          <form action="<?= url().'/update/'.$id; ?>" method="post" class="w-4/12 p-8 pb-16 bg-white rounded-[2.5rem] shadow-lg shadow-gray-600">
              <h3 class="mt-10 text-center font-bold text-[1.5rem]">Update User</h3>
              <div class="mt-10 relative">
                  <input value="<?= $user->name; ?>" id="name" type="text" placeholder="Name" name="name"
                         class="peer peer-input"
                  />
                  <label for="name" class="float-label">Name</label>
              </div>
              <div class="mt-10 relative">
                  <input value="<?= $user->email; ?>" id="email" type="email" placeholder="Email Address" name="email"
                         class="peer peer-input"
                  />
                  <label for="email" class="float-label">Email Address</label>
              </div>
              <div class="mt-10 relative">
                  <input value="<?= $user->role; ?>" id="role" type="number" placeholder="Role" name="role"
                         class="peer peer-input"
                  />
                  <label for="role" class="float-label">Role</label>
              </div>
              <button class="btn-red w-[100%] mt-10" type="submit">Update</button>
          </form>
      </div>
<?php require "views/partials/footer.php"; ?>