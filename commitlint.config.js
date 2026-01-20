module.exports = {
    extends: ['@commitlint/config-conventional'],
    rules: {
        // Types autorisés
        'type-enum': [
            2,
            'always',
            [
                'init',
                'feat',
                'fix',
                'refactor',
                'chore',
                'test',
                'docs',
                'style',
                'perf',
                'ci',
                'build',
            ],
        ],

        // Type obligatoire
        'type-empty': [2, 'never'],

        // Message court
        'subject-max-length': [2, 'always', 72],

        // Pas de point final
        'subject-full-stop': [2, 'never', '.'],

        // Sujet obligatoire
        'subject-empty': [2, 'never'],

        // Case du sujet (libre pour le français)
        'subject-case': [0],

        // Scope optionnel mais propre
        'scope-case': [2, 'always', 'kebab-case'],

        // Header global
        'header-max-length': [2, 'always', 100],
    },
};
