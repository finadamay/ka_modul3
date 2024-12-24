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
                        url: "${TEAMS_WEBHOOK_URL}",
                        httpMode: 'POST',
                        contentType: 'APPLICATION_JSON',
                        requestBody: message
                    )
                }
            }
        }
    }
}
