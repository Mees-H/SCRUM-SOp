<?php

namespace Database\Seeders;

use App\Models\MemberGroup;
use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #region teammembers
        //Bestuur
        $wim = TeamMember::create([
            'name' => 'Dhr. Wim Jansen',
            'email' => 'wthjansen@gmail.com',
            'phonenumber' => '0653148657',
            'function' => 'Voorzitter/Coördinator',
            'imgurl' => 'wim.jpeg'
        ]);
        
        $frans = TeamMember::create([
            'name' => 'Dhr. Frans Reek',
            'email' => 'frans@fransreek.com',
            'phonenumber' => '0683589290',
            'function' => 'Penningmeester',
            'imgurl' => 'frans.png'
        ]);
        
        $cees = TeamMember::create([
            'name' => 'Dhr. Cees Heesbeen',
            'email' => 'ceesheesbeen@gmail.com',
            'phonenumber' => '0628429285',
            'function' => 'Secretaris/Materiaalbeheer',
            'imgurl' => 'cees.png'
        ]);

        //Golfprofessionals
        $helmuth = TeamMember::create([
            'name' => 'Dhr. Helmuth van Heel',
            'email' => 'info@helmuthvanheel.nl',
            'phonenumber' => '0648082902',
            'website' => 'www.helmuthvanheel.nl',
            'imgurl' => 'helmuth.jpeg'
        ]);
        
        $naud = TeamMember::create([
            'name' => 'Dhr. Naud Bank',
            'email' => 'naud.pga@gmail.com',
            'phonenumber' => '0651808202',
            'imgurl' => 'naud.jpeg'
        ]);
        
        $suzanne = TeamMember::create([
            'name' => 'Mevr. Suzanne Lanfermeijer',
            'email' => 'suzannelanfermeijer@yahoo.co.uk',
            'phonenumber' => '0655597304',
            'website' => 'www.golfclubookmeer.nl',
            'imgurl' => 'suzanne.jpeg'
        ]);
        
        $robbin = TeamMember::create([
            'name' => 'Dhr.Robbin Schuurman',
            'email' => 'rschuurman@xebia.com',
            'phonenumber' => '0655414822',
            'imgurl' => 'robbin.jpeg'
        ]);

        //Begeleiders
        $karl = TeamMember::create([
            'name' => 'Dhr. Karl Stoof',
            'email' => 'kjm.stoof@hetnet.nl',
        ]);
        
        $hetty = TeamMember::create([
            'name' => 'Mevr. Hetty Stoof',
            'email' => 'hom.stoof@hetnet.nl',
        ]);
        
        $edwin = TeamMember::create([
            'name' => 'Dhr. Edwin Bijlsma',
            'email' => 'edwin.m.bijlsma@gmail.com',
        ]);
        
        $edith = TeamMember::create([
            'name' => 'Mevr. Edith Reek',
            'email' => 'edithreek@gmail.com',
        ]);
        
        $rene = TeamMember::create([
            'name' => 'Dhr. René van Oeffelen',
            'email' => 'r.van.oeffelen@ziggo.nl',
        ]);
        
        $lau = TeamMember::create([
            'name' => 'Dhr. Lau Verhoeven',
            'email' => 'lverhoeven54@ziggo.nl',
        ]);
        
        $hans = TeamMember::create([
            'name' => 'Dhr. Hans van Ettekoven',
            'email' => 'hans.vanettekoven@planet.nl',
        ]);
        
        $marcel = TeamMember::create([
            'name' => 'Dhr. Marcel Bosboom',
            'email' => 'fam.bosboom@upcmail.nl',
        ]);
        
        $jacob = TeamMember::create([
            'name' => 'Dhr. Jacob Baars',
            'email' => 'fam.baas@ziggo.nl',
        ]);

        //Contacten
        $peter = TeamMember::create([
            'name' => 'Dhr. Peter Janssen',
            'email' => 'pjanssen@cello-zorg.nl',
            'phonenumber' => '0654650449',
            'function' => 'Projectleider vrije tijd Cello',
            'imgurl' => 'peter.jpeg'
        ]);
        
        #endregion
        #region membergroups

        $bestuur = MemberGroup::create([
            'name' => 'Bestuur Stichting Special Golf'
        ]);

        $profs = MemberGroup::create([
            'name' => 'Golfprofessionals'
        ]);

        $begeleiders = MemberGroup::create([
            'name' => 'Begeleiders'
        ]);

        $commissie = MemberGroup::create([
            'name' => 'Wedstrijdcommissie'
        ]);

        $pr = MemberGroup::create([
            'name' => 'Public relation en marketing'
        ]);

        $contacten = MemberGroup::create([
            'name' => 'Contacten'
        ]);

        $webmaster = MemberGroup::create([
            'name' => 'Webmaster'
        ]);

        #endregion
        #region relations
        $bestuur->members()->attach([
            $wim->id,
            $frans->id,
            $cees->id
        ]);

        $profs->members()->attach([
            $naud->id,
            $robbin->id,
            $wim->id,
            $suzanne->id,
            $helmuth->id
        ]);

        $begeleiders->members()->attach([
            $karl->id,
            $hetty->id,
            $edwin->id,
            $edith->id,
            $rene->id,
            $lau->id,
            $hans->id,
            $marcel->id,
            $cees->id,
            $jacob->id
        ]);

        $commissie->members()->attach([
            $karl->id,
            $hetty->id
        ]);

        $pr->members()->attach($robbin->id);

        $contacten->members()->attach($peter->id);

        $webmaster->members()->attach($wim->id);
        #endregion
    }
}
