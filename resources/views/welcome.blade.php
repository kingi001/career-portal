INSERT INTO sub_counties (county_id, subcounty_name)
VALUES
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Kilifi North'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Kilifi South'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Kaloleni'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Rabai'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Ganze'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Malindi'),
((SELECT id FROM counties WHERE county_name='Kilifi'), 'Magarini');
