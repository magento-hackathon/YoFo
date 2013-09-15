<?php


use \Cotya\YoFo\Entity\Project;

$project = $app['controllers_factory'];

$projectProvider = function($projectId) use($app) {
    $project = $app['orm.em']->find('Cotya\YoFo\Entity\Project', $projectId);
    return $project;
};

$project->get('/{project}', function($project) use($app) {
    /** @var Project $project */
        
    $repositories = $project->getRepositories();
    $patches      = $project->getPatches();
    $issues       = $project->getIssues();
        
    return $app['mustache']->render('project/overview.html', array(
            'project'      => ($project),
            'repositories' => $repositories,
            'patches'      => $patches,
            'issues'       => $issues,
        ));
})
->assert('project', '\d+')
->convert('project', $projectProvider);

return $project;
