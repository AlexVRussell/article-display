-- UPDATE EACH PASSWORD HASH IN THE USERS TABLE --

UPDATE users
SET password_hash = '$2y$10$BzTE3bHNpgcLGlvDAOdAsut5JUPAkEh45HYh1IWgel3DlrAw6Pwo2'
WHERE email = 'yoda@theforce.org';

UPDATE users 
SET password_hash = '$2y$10$tG4FvMedTtjsXqQ.SDc5NeCyqDCt0Qc0LIvVdLy7qPfKHr.Z.9Ohi'
WHERE email = 'rey@theforce.org';

UPDATE users
SET password_hash = '$2y$10$lioNrHGfNJYjgAyhGrWPv.pGgahZSOFiPHkxURfGVJCkVpaOtnwhW'
WHERE email = 'leia@rebellion.org';

UPDATE users 
SET password_hash = '$2y$10$.24Lf3l1HvOTAv0U2ugqFOfMAl.5p98Xj.NpbkRm2GCikiFCLzKLa'
WHERE email = 'luke@theforce.org';


