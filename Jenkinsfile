pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "lailasyafinad/mouse:${BUILD_NUMBER}"
    }

    stages {
        stage('Clone Repository') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    bat "docker build -t ${DOCKER_IMAGE} ."
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-jenkins',
                 usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    bat """
                    echo %DOCKER_PASSWORD% > docker-password.txt
                    docker login -u %DOCKER_USERNAME% --password-stdin < docker-password.txt
                    docker push ${DOCKER_IMAGE}
                    del docker-password.txt
                    """
                }
            }
        }

        stage('Notify Teams') {
            steps {
                script {
                    def message = """
                    {
                        "title": "Jenkins Build Notification",
                        "text": "Build #${env.BUILD_NUMBER} has been pushed to Docker registry.",
                        "themeColor": "0076D7",
                        "sections": [
                            {
                                "activityTitle": "Pipeline Notification",
                                "activitySubtitle": "Build Status: Success",
                                "facts": [
                                    { "name": "Job Name", "value": "${env.JOB_NAME}" },
                                    { "name": "Build Number", "value": "${env.BUILD_NUMBER}" },
                                    { "name": "Docker Image", "value": "${DOCKER_IMAGE}:${env.BUILD_NUMBER}" }
                                ]
                            }
                        ]
                    }
                     """
                    httpRequest(
                        url: "${https://telkomuniversityofficial.webhook.office.com/webhookb2/64c1ccfe-a88b-43f0-85f9-2ace042b92ae@90affe0f-c2a3-4108-bb98-6ceb4e94ef15/JenkinsCI/765a8c2006b143b5a2da1d2d5812fcd7/5a99cc21-b146-4641-9092-a4fc005d24ba/V2u5qt6kaonZZ9b_1zVyqo3Tzx9K1DkJQO8sQ6bjw1OYo1}",
                        httpMode: 'POST',
                        contentType: 'APPLICATION_JSON',
                        requestBody: message
                    )
                }
            }
        }
    }
}
