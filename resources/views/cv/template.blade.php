<!DOCTYPE html>
<html>
<head>
    <title>CV - {{ $data['full_name'] ?? 'Applicant' }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; font-size: 12px; }
        .container { width: 100%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 0; font-size: 14px; color: #555; }
        .section { margin-bottom: 15px; }
        .section h2 { font-size: 18px; border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-bottom: 10px; }
        .item { margin-bottom: 10px; }
        .item h3 { margin: 0; font-size: 14px; }
        .item p { margin: 0; font-size: 12px; }
        .skills ul { list-style: none; padding: 0; margin: 0; }
        .skills li { display: inline-block; background: #eee; padding: 3px 8px; margin: 0 5px 5px 0; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $data['full_name'] ?? 'N/A' }}</h1>
            <p>{{ $data['email'] ?? 'N/A' }} | {{ $data['phone'] ?? 'N/A' }} | <a href="{{ $data['linkedin'] ?? '#' }}">{{ $data['linkedin'] ?? 'LinkedIn' }}</a></p>
            <p>{{ $data['address'] ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <h2>Work Experience</h2>
            @if (!empty($data['experiences']))
                @foreach ($data['experiences'] as $experience)
                    <div class="item">
                        <h3>{{ $experience['job_title'] ?? 'N/A' }} at {{ $experience['company'] ?? 'N/A' }}</h3>
                        <p>{{ $experience['start_date'] ?? 'N/A' }} - {{ $experience['end_date'] ?? 'N/A' }}</p>
                        <p>{{ $experience['responsibilities'] ?? 'N/A' }}</p>
                    </div>
                @endforeach
            @else
                <p>No work experience provided.</p>
            @endif
        </div>

        <div class="section">
            <h2>Education</h2>
            @if (!empty($data['educations']))
                @foreach ($data['educations'] as $education)
                    <div class="item">
                        <h3>{{ $education['degree'] ?? 'N/A' }} from {{ $education['institution'] ?? 'N/A' }}</h3>
                        <p>Graduation Date: {{ $education['graduation_date'] ?? 'N/A' }}</p>
                    </div>
                @endforeach
            @else
                <p>No education provided.</p>
            @endif
        </div>

        <div class="section skills">
            <h2>Skills</h2>
            @if (!empty($data['skills']))
                <ul>
                    @foreach (explode(',', $data['skills']) as $skill)
                        <li>{{ trim($skill) }}</li>
                    @endforeach
                </ul>
            @else
                <p>No skills provided.</p>
            @endif
        </div>
    </div>
</body>
</html>
